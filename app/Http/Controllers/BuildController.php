<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage as Storage;
// use Symfony\Component\HttpFoundation\File\UploadedFile;

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
        // $keyname = $request->input('keyname');
        // Add other things here.
        Building::create($request->all());
        return redirect('buildings');
    }

    function update($id,Request $request){

        $building = Building::findOrFail($id);
        $building->update($request->all());
        return redirect('modify');
    }

    function destroy($id){
        Building::destroy($id);
        return redirect('modify');
    }


    function findImg($name){
        $file = Storage::disk('local')->get($name);
        return new Response($file, 200);
    }

    function debug(Request $request){ //problem here
        $img = $request->file('file');
        // $name = $request->input('name');
        // $image = File::make(Storage::get($img));
        // echo Storage::get('chicken.jpg');

        if(File::isFile($img)){
            echo 'Something here';
            // echo $request->input('file');
            // echo basename($img);
            /*
                dont delete next
            */
            Storage::disk('local')->put('id.jpg', File::get($img)); //works with (enctype="multipart/form-data") attribute to target form
        } else {
            echo 'nothing here. :(';
            // echo $request .'<br>'. $img;
        }

    }

}
