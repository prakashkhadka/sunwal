<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
		'title',
		'subCatImg',
		'category_id',
		'slug'
    ];

    public function category(){
    	return $this->belongsTo('App\Category');
    }
}
