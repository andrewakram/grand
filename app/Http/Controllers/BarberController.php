<?php

namespace App\Http\Controllers;

use App\Barber;
use App\Barbersrate;
use Illuminate\Http\Request;
use DB;

class BarberController extends Controller
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


    public function all_barbers(){
        $barbers=Barber::orderBY("b_id","desc")->get();
        return view('layouts.barbers.all_barbers',['barbers'=>$barbers]);
    }

    public function add_barber(){
        return view('layouts.barbers.add_barber');
    }

    public function add_new_barber(Request $request){
        $data = $this->validate(request(), [
            'barbertName'   => 'required|unique:barbers,b_name',
            'barberPrice'   => 'required',
            'barberLink'    => 'required|unique:barbers,b_link',
            'barberActive'  => 'required',
        ],[],[
            'barbertName'   =>'Barber Name',
            'barberPrice'   =>'Barber Price',
            'barberLink'    =>'Barber Link',
            'barberActive'  =>'Barber Is Active',
        ]);
        if ($request->file('barberImage')) {
            $filenameWithExtention = $request->file('barberImage')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExtention, PATHINFO_FILENAME);
            $extention = $request->file('barberImage')->getClientOriginalExtension();
            $fileNameStore = 'barberImg_' . time() . '.' . $extention;
            $path = $request->file('barberImage')->storeAs('public/barber_images', $fileNameStore);
            $add                  = new Barber();
            $add->b_name          = request('barbertName');
            $add->b_price         = request('barberPrice');
            $add->b_link          = request('barberLink');
            $add->b_active        = request('barberActive');
            $add->b_photo         = $fileNameStore;
            $add->save();
        }else{
            $add                  = new Barber();
            $add->b_name          = request('barbertName');
            $add->b_price         = request('barberPrice');
            $add->b_link          = request('barberLink');
            $add->b_active        = request('barberActive');
            $add->save();
        }
        return redirect('/all/barbers');
    }

    public function edit_barber($b_id){
        $barbers=Barber::orderBY("b_id","desc")
            ->where("b_id",$b_id)->get();
        return view('layouts.barbers.edit_barber',['barbers'=>$barbers]);
    }

    public function update_barber(Request $request,$b_id){
        $data = $this->validate(request(), [
            'barbertName'   => 'required|unique:barbers,b_name',
            'barberPrice'   => 'required',
            'barberLink'    => 'required|unique:barbers,b_link',
            'barberActive'  => 'required',
        ],[],[
            'barbertName'   =>'Barber Name',
            'barberPrice'   =>'Barber Price',
            'barberLink'    =>'Barber Link',
            'barberActive'  =>'Barber Is Active',
        ]);
        if ($request->file('barberImage')) {
            $filenameWithExtention = $request->file('barberImage')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExtention, PATHINFO_FILENAME);
            $extention = $request->file('barberImage')->getClientOriginalExtension();
            $fileNameStore = 'barberImg_' . time() . '.' . $extention;
            $path = $request->file('barberImage')->storeAs('public/barber_images', $fileNameStore);
            DB::table('barbers')
                ->where('b_id', $b_id)
                ->update([
                    'b_name'          =>request('barbertName'),
                    'b_price'         =>request('barberPrice'),
                    'b_link'          =>request('barberLink'),
                    'b_active'        =>request('barberActive'),
                    'b_photo'         =>$fileNameStore
                ]);
        }else{
            DB::table('barbers')
                ->where('b_id', $b_id)
                ->update([
                    'b_name'          =>request('barbertName'),
                    'b_price'         =>request('barberPrice'),
                    'b_link'          =>request('barberLink'),
                    'b_active'        =>request('barberActive'),
                ]);
        }
        session()->flash('insert_message','Record updated successfully');
        return redirect('/all/barbers');
    }

    public function delete_barber($b_id){
        Barber::destroy($b_id);
        return back();
    }




}
