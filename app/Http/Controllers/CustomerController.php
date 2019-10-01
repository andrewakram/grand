<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use DB;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function all_customers(){
        $customers=Customer::orderBY("c_id","desc")->get();
        return view('layouts.customers.all_customers',['customers'=>$customers]);
    }

    public function add_customer(){
        return view('layouts.customers.add_customer');
    }

    public function add_new_customer(Request $request){
        $data = $this->validate(request(), [
            'customerName'      => 'required',
            'customerEmail'     => 'required|unique:customers,c_email',
            'customerPassword'  => 'required',
        ],[],[
            'customerName'      =>'Customer Name',
            'customerEmail'     =>'Customer Email',
            'customerPassword'  =>'Customer Password',

        ]);
        $add                  = new Customer();
        $add->c_name          = request('customerName');
        $add->c_email         = request('customerEmail');
        $add->c_password      = md5(request('customerPassword'));
        $add->save();
        return redirect('/all/customers');
    }

    public function edit_customer($c_id){
        $customers=Customer::orderBY("c_id","desc")
            ->where("c_id",$c_id)->get();
        return view('layouts.customers.edit_customer',['customers'=>$customers]);
    }

    public function update_customer(Request $request,$c_id){
        $data = $this->validate(request(), [
            'customerName'      => 'required',
            'customerEmail'     => 'required|unique:customers,c_email',
            'customerPassword'  => 'required',
        ],[],[
            'customertName'     =>'Customer Name',
            'customerEmail'     =>'Customer Email',
            'customerPassword'  =>'Customer Password',

        ]);
        DB::table('customers')
            ->where('c_id', $c_id)
            ->update([
                'c_name'          =>request('customertName'),
                'c_price'         =>request('customerPrice'),
                'c_link'          =>request('customerLink')
            ]);
        session()->flash('insert_message','Record updated successfully');
        return redirect('/all/customers');
    }

    public function delete_customer($c_id){
        Customer::destroy($c_id);
        return back();
    }

}
