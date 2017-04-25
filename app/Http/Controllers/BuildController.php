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

    function search(Request $request){
        $string = $request->input('query');
        // return view('search')
        // return $string;

    	$buildings = DB::table('buildings')
		  		->where('name', 'LIKE', '%' . $string . '%')
		  			->get();

        if(sizeof($buildings) > 0){
            return $buildings;
        }

        $buildings = DB::table('buildings')
                ->where('description', 'LIKE', '%' . $string . '%')
                    ->get();

        if(sizeof($buildings) > 0){
            return $buildings;
        }

        $buildings = DB::table('buildings')
                ->where('keyname', 'LIKE', '%' . $string . '%')
                    ->get();
		return $buildings;
    }

    function autocomplete(Request $request){
        $string = $request->input('query');
        // return view('search')
        // return $string;

        $buildings = DB::table('buildings')
                ->where('name', 'LIKE', '%' . $string . '%')
                    ->get();

        if(sizeof($buildings) > 0){
            return $buildings;
        }

        $buildings = DB::table('buildings')
                ->where('description', 'LIKE', '%' . $string . '%')
                    ->get();

        if(sizeof($buildings) > 0){
            return $buildings;
        }

        $buildings = DB::table('buildings')
                ->where('keyname', 'LIKE', '%' . $string . '%')
                    ->get();
        return $buildings;
    }


    /*
        CRUD Functions
    // */
    // function index(){
    //     // Building::create($request->all());
    //     return view('pages.modify');
    // }

    function create(Request $request){
        $keyname = $request->input('keyname');
        // Add other things here.
        $img = $request->file('file');

        if(File::isFile($img)){
            Storage::disk('local')->put($keyname.'.jpg', File::get($img)); //works with (enctype="multipart/form-data") attribute to target form
        }

        Building::create($request->all());
        return redirect('buildings');
    }

    function update($id,Request $request){
        $building = Building::findOrFail($id);
        $oldkeyname = $building->keyname .'.jpg'; //old filename

        $keyname = $request->keyname .'.jpg'; //new filename
        $img = $request->file('file');
        $update = false;

        if (Storage::disk('local')->has($oldkeyname)) {
            $old_file = Storage::disk('local')->get($oldkeyname);
            Storage::disk('local')->put($keyname, $old_file);
            $update = true;
        }

        if($img){
            Storage::disk('local')->put($keyname, File::get($img)); //works with (enctype="multipart/form-data") attribute to target form
        }

        if ($update && $oldkeyname !== $keyname) {
            Storage::delete($oldkeyname);
        }

        $building->update($request->all());
        return redirect('modify');
    }

    function destroy($id){
        // $building = Building::findOrFail($id);
        Building::destroy($id);
        // $building->delete();
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
