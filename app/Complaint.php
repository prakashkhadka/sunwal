<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
    	'ad_id',
    	'reason',
    	'detailreason'
    ];

    public function ad(){
    	return $this->belongsTo('App\Ad');
    }
}
