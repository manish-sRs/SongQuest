<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userHome()
    {
        return view('userHome',["msg"=>"Hello! "]);
    }
    public function adminHome()
    {
        return view('adminHome',["msg"=>"Hello! "]);
    }
    public function recommenderHome()
    {
        return view('recommenderHome',["msg"=>"Hello! "]);
    }
}
