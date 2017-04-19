<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    //
    protected $fillable = ['name', 'description', 'height', 'roofcolor','area', 'wallcolor', 'image', 'polygon'];
}
