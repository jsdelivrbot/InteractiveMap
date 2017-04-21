<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Building as Building;

class BuildController extends Controller
{
    //

    //     public function __construct()
    // {
    //     $searchPH = 'Search to Edit';
    //     return view('pages.modify',compact('searchPH'));
    // }

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

    function search($string){
    	// $string = Request::get('search');
        // return view('search')
        // return $string;

    	$buildings = DB::table('buildings')
		  		->where('name', 'LIKE', '%' . $string . '%')
		  		->where('description', 'LIKE', '%' . $string . '%')
		  			->paginate(5);

  //   	// $result = Request::input('search');
		return $buildings;
        // $hasCoffeeMachine = Request::get('hasCoffeeMachine');
    }

    function autocomplete(Request $request){
        $text = $request->input('query');
        $data = DB::table('buildings')
                ->where('name', 'LIKE', '%' . $text . '%')
                ->where('description', 'LIKE', '%' . $text . '%')
                    ->get();
        return $data;
        // return $request->input('query');
        // return response()->json($data);
    }


    /*
        CRUD Functions
    // */
    // function index(){
    //     // Building::create($request->all());
    //     return view('pages.modify');
    // }

    function create(Request $request){
        Building::create($request->all());
        return redirect('buildings');
    }

    function showModify($id){ //not really needed. //if clicked on
        // return redirect('buildings');
        return view('pages.modify');
    }

    // function store(){
    //     return view('pages.modify');
    // }

    function update($id,Request $request){
        // echo $id;
        // echo $request;
        $building = Building::findOrFail($id);
        $building->update($request->all());
        return redirect('modify');
    }

    function destroy($id){
        Building::destroy($id);
        return redirect('modify');
    }

    // function edit(){

    // }

}
