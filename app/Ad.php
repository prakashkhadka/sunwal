<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ad extends Model
{
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'title',
    'file',
    'category_id',
    'subcategory_id',
    'brand',
    'gender_id',
    'price',
    'ownermsg',
    'condition',
    'user_id',
    'phone',
    'address',
    'consent',
    'adminwhoallowed',
    'allowed',
    'removedbyuser',
    'removedbyadmin',
    'sold',
    'slug'
    ];
    use SoftDeletes;
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'unique'=>true
            ]
            
        ];
    }

    public function images(){
        return $this->hasMany('App\Adimage');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function adcounter(){
        return $this->hasOne('App\Adviewcounter');
    }

    public function complaints(){
        return $this->hasMany('App\Complaint');
    }

}
