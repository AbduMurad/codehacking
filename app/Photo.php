<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //

    const place_holder = '/images/placeholder.png';
    protected $images = '/images/';

    protected $fillable = ['file'];

    public function getFileAttribute ($photo) {
        return $this->images . $photo;
    }
}
