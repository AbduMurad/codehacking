<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model implements Sluggable
{
    //

    protected $fillable = [
        'user_id',
        'category_id',
        'photo_id',
        'title',
        'body'
    ];

    public function user () {
        return $this->belongsTo('App\User');
    }

    public function photo () {
        return $this->belongsTo('App\Photo');
    }

    public function category () {
        return $this->belongsTo('App\Category');
    }

    public function comments () {
        return $this->hasMany('App\Comment');
    }
}
