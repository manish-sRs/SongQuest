<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recommendation;
use App\Models\User;

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
        $users = User::all();

        return view('adminHome',["msg"=>"Hello! "], ['users' => $users]);
    }
    public function recommenderHome()
    {
        $recommendation_list= Recommendation::join('songs as songs0', 'recommendations.recommendation_for', '=', 'songs0.id')
        
                                        ->join('songs as songs1', 'recommendations.recommendation_1', '=', 'songs1.id')
        
                                       ->join('songs as songs2', 'recommendations.recommendation_2', '=', 'songs2.id')
        
                                       ->join('songs as songs3', 'recommendations.recommendation_3', '=', 'songs3.id')
                                       
                                        ->select(
                                            'recommendations.*',
        
                                            'songs0.title as recommendation_for_name',
        
                                            'songs1.title as recommendation_1_name',
        
                                            'songs2.title as recommendation_2_name',
        
                                            'songs3.title as recommendation_3_name'
                                        )->get();
                                  

        return view('recommenderHome',["msg"=>"Hello! ","recommendations"=>$recommendation_list]);
    }
}
