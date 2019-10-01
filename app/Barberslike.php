<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barberslike extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'b_l_id';
    protected $table = 'barberslikes';
    protected $fillable = ['b_like','customer_id','barber_id'];
    protected $date = ['delete_at'];
    protected $hidden = ["deleted_at"];
}
