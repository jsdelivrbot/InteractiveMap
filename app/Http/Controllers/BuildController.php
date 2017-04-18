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
    	// $all = Building::all();
    	return Building::all();
    }

    function bID($id){
    	// $thisB = Building::find($id);
    	// echo 'Name:' . $thisB->name . '<br />';
    	// echo 'Id:'. $id .'<br />'; 
    	return Building::find($id);
    }

    function notId($id){
    	$buildings = Building::all()->except($id);
    	 return $buildings;
    }
}
