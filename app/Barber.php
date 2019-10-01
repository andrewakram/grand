<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barber extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'b_id';
    protected $table = 'barbers';
    protected $fillable = ['b_name','b_photo','b_price','b_link'];
    protected $date = ['delete_at'];
    protected $hidden = ["deleted_at"];


    /*function rate($braber_id) {
        return Barbersrate::where('barber_id',$braber_id)->pluck('b_rate')->AVG();
    }*/
}
