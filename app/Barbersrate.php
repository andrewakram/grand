<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barbersrate extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'b_r_id';
    protected $table = 'barbersrates';
    protected $fillable = ['b_rate','customer_id','barber_id'];
    protected $date = ['delete_at'];
    protected $hidden = ["deleted_at"];
//
//    function getBRateAttribute($value)
//    {
//        if($value){
//            return $value;
//        } else {
//            return ;
//        }
//
//    }

function rate($braber_id) {
    return Barbersrate::whereIn('barber_id',$braber_id)->pluck('b_rate')->AVG();
}
}
