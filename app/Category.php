<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    	'title',
    	'categoryImg',
    	'hasgender',
    	'slug'
    ];

    
    public function categories(){
    	return $this->hasMany('App\Subcategory');
    }

    public function ads(){
        return $this->hasMany('App\Ad');
    }

}
