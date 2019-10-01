<?php

namespace App\Http\Controllers\Api;

use App\Barberslike;
use App\Barbersrate;
use App\Customer;
use App\Barber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Str;

class CustomerController extends Controller
{
    public function __construct()
    {
        //$this->isLogged();
    }

    public function login_customer(Request $request){
        $customer = Customer::where("c_email", request("email"))
            ->where("c_password", md5(request("password")))->get();
        if (sizeof($customer) > 0) {
            $token = Str::random(25);
            DB::table('customers')
                ->where('c_email', request("email"))
                ->update([
                    'c_token' => $token,
                ]);
            $customer = Customer::where("c_email", request("email"))
                ->where("c_password", md5(request("password")))
                ->select("c_id as id", "c_name as name", "c_email as email",
                    "c_password as password", "c_token as token")
                ->get();
            return response()->json([
                'status' => "success",
                'message' => "Logged in successfully",
                'data' => $customer
            ]);
        } else {
            return response()->json([
                'status' => "failed",
                'message' => "Incorrect email or password"
            ]);
        }
    }

    public function register_customer(Request $request){
        $data = $this->validate(request(), [
            'name'          => 'required',
            'email'         => 'required|unique:customers,c_email',
            'password'      => 'required',
        ],[],[
            'name'          =>'Customer Name',
            'email'         =>'Customer Email',
            'password'      =>'Customer Password',
        ]);
        $token = Str::random(25);
        $add                  = new Customer();
        $add->c_name          = request('name');
        $add->c_email         = request('email');
        $add->c_password      = md5(request('password'));
        $add->c_token         = $token;
        $add->save();
        $customer = Customer::where("c_email", request("email"))
            ->where("c_token", $token)->get();
        if (sizeof($customer) > 0) {
            $token = Str::random(25);
            DB::table('customers')
                ->where('c_email', request("email"))
                ->update([
                    'c_token' => $token,
                ]);
            return response()->json([
                'status' => "success",
                'message' => "User created successfully",
                'data' => $customer
            ]);
        }
    }

    public function logout_customer(Request $request){
        $token=($request->hasHeader('token') ? $request->header('token') : "");
        if($token != ""){
            DB::table('customers')
                ->where('c_email', request("email"))
                ->where('c_token', $token)
                ->update([
                    'c_token' => "",
                ]);
            return response()->json([
                'status' => "success",
                'message' => "Logged out successfully",
            ]);
        }else{
            return response()->json([
                'status' => "success",
                'message' => "Error! user not found",
            ]);
        }
    }

    public function show_customer_list(Request $request){
        $token=($request->hasHeader('token') ? $request->header('token') : "$$$$$");
        $customer = Customer::where("c_token",$token)->get();
        if(sizeof($customer)>0){
            $barber_item = [];
            $barber_list = [];
            $user = 1;
            $List1 = Barber::select('b_id as id',
                'b_name as shop_name',
                'b_price as price',
                'b_photo as image'
            )
                ->groupBy('id', 'b_name', 'b_price', 'b_photo')
                ->get();

            foreach ($List1 as $L) {
                $barber_item['shop_name'] = $L->shop_name;
                $barber_item['price'] = $L->price;
                $barber_item['image'] = $L->image;

                $barber_item['rate'] = Barbersrate::where('barber_id', $L->id)
                    ->get()
                    ->avg('b_rate');
                if (empty($barber_item['rate'])) {
                    $barber_item['rate'] = 0;
                }
                if (!empty($user)) {
                    $barber_item['is_favorite'] = Barberslike::where('customer_id', 1)
                        ->where('barber_id', $L->id)
                        ->get()
                        ->count();
                    if (!empty($barber_item['is_favorite'])) {
                        $barber_item['is_favorite'] = 'True';
                    } else {
                        $barber_item['is_favorite'] = 'False';
                    }
                }
                $barber_list[] = $barber_item;
            }
            return response()->json([
                'status' => "success",
                'message' => "Logged in successfully",
                'data' => $barber_list
            ]);
        }else{
            $barber_item = [];
            $barber_list = [];
            $user = 1;
            $List1 = Barber::select('b_id as id',
                'b_name as shop_name',
                'b_price as price',
                'b_photo as image'
            )
                ->groupBy('id', 'b_name', 'b_price', 'b_photo')
                ->get();

            foreach ($List1 as $L) {
                $barber_item['shop_name'] = $L->shop_name;
                $barber_item['price'] = $L->price;
                $barber_item['image'] = $L->image;

                $barber_item['rate'] = Barbersrate::where('barber_id', $L->id)
                    ->get()
                    ->avg('b_rate');
                if (empty($barber_item['rate'])) {
                    $barber_item['rate'] = 0;
                }
                if (!empty($user)) {
                    $barber_item['is_favorite'] = "you must login to see this";
                }
                $barber_list[] = $barber_item;
            }
            return response()->json([
                'status' => "success",
                'message' => "Logged in successfully",
                'data' => $barber_list
            ]);
        }
    }

    public function like_barber_shop(Request $request){
        $token = ($request->hasHeader('token') ? $request->header('token') : "$$$$$");
        $customer = Customer::where("c_token", $token)->get();
        if (sizeof($customer) > 0) {
            foreach ($customer as $c){
                $like=(request('is_favorite')== "True" ? "1" : "0");
                $barberslikes=DB::table('barberslikes')
                    ->where('barber_id', request("barberId"))
                    ->where('customer_id', $c->c_id)
                    ->get();
                if(sizeof($barberslikes) > 0){
                    DB::table('barberslikes')
                        ->where('barber_id', request("barberId"))
                        ->where('customer_id', $c->c_id)
                        ->update([
                            'b_like'        =>$like
                        ]);
                }else{
                    $add                  = new Barberslike();
                    $add->barber_id       = request('barberId');
                    $add->customer_id     = $c->c_id;
                    $add->b_like          = $like;
                    $add->save();
                }
                return response()->json([
                    'status' => "success",
                    'message' => "Record affected successfully",
                ]);
            }
        }else{
            return response()->json([
                'status' => "failed",
                'message' => "You must sign in to affect data"
            ]);
        }
    }


    /*======================================================*/
    /*======= Solving Problem ======*/
    public function solvingProblem(Request $request){
        if(request("n") > 0 AND request("n")<=1000000000){
            $n=request("n");
            $x=1;
            while ($n >= 1){
                $value=$n/$x;
                $result=is_int($value);
                if($result == true){
                    $x++;
                    if ($n-$x < 1){return $n;}
                }else{
                    $n=$n-$x;
                    $x++;
                    if ($n-$x < 1){return $n;}
                }
            }
            return $n;
        }else{
            return "enter value between 1,1000000000";
        }

    }
    /*======================================================*/




}
