<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable=[
    	'name',
    	'user_id',
    	'ad_id',
    	'seller_id',
    	'email',
    	'phone',
    	'message'
    ];

    public function ad(){
    	return $this->belongsTo('App\Ad');
    }

    public function messages(){
        return $this->hasMany('App\Messagereply');
    }
}
