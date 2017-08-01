<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = [
    	'user_id',
    	'phone',
    	'municipility',
    	'ward',
    	'tol',
    	'address',
    	'file'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }

}
