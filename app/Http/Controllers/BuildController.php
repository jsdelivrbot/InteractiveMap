<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Building as Building;

class BuildController extends Controller
{
    //
    function all(){
    	$all = Building::all();
    	return compact('all');
    }
}
