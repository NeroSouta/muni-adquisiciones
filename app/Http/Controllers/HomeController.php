<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**
* Es el controlador de la autenticación de cualquier usuario.
*
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function start(){
        return view('start');
    }
}
