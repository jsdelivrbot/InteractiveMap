<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        return view('index');
    }

    public function buildings(){
        $searchPH = 'Search building';
        return view('pages.building',compact('searchPH'));
    }

    public function modify(){
        $searchPH = 'Search to Edit';
        return view('pages.modifynew',compact('searchPH'));
    }

    public function modify2(){
        $searchPH = 'Search to Edit';
        return view('pages.modify',compact('searchPH'));
    }
}