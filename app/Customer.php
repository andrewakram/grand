<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'c_id';
    protected $table = 'customers';
    protected $fillable = ['c_name','c_email','c_password','c_token'];
    protected $date = ['delete_at'];
    protected $hidden = ["deleted_at"];
}
