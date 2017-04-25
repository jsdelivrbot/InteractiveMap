<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    //
    protected $fillable = ['name','keyname', 'description', 'height', 'roofcolor','area', 'wallcolor', 'image', 'polygon'];
}
