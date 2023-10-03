<?php

namespace App\Http\Controllers;

use App\Models\Recommendation;
use Illuminate\Http\Request;
use App\Models\song;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;



class RecomendationController extends Controller
{
    //
    public function index() {
        $song = song::all();
        
        return view('recommendor.recommendation.recommendation', ['song' => $song]);
    }

    public function create(Request $request){
        $userId = Auth::id();

        Recommendation::create([
        'recommendation_name' => "fggfgf",
        'recommendation_for' => $request->recommendation_for,
        'recommendation_1' => $request->recommendation_1,
        'recommendation_2' => $request->recommendation_2,
        'recommendation_3' => $request->recommendation_3,
        'user_id' => $userId 
        ]);


        Alert::success('Success', 'Custom Recommendation added successfully.');
        // Alert::error('Error Message', 'Optional Title');
        // Alert::warning('Warning Message', 'Optional Title');
        // Alert::info('Info Message', 'Optional Title');
        // Alert::question('Question Message', 'Optional Title');

        
        return redirect()->route('recommender.recommendation');
    }
}
