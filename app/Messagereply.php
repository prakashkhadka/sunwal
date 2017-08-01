<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messagereply extends Model
{
    protected $fillable = [
    	'message_id',
    	'ad_id',
    	'user_id',
    	'sender_id',
    	'name',
    	'email',
    	'phone',
    	'message'
    ];

    public function sender(){
    	return $this->belongsTo('App\User');
    }
}
