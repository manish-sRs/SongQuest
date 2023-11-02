<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\artist;
use App\Models\Recommendation;
use App\Models\song;
use App\Models\Genre;
use App\Models\ArtistSong;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\SongSimilarity;

class SongController extends Controller
{
    public function index() {
        $song = song::all();
        $genre = Genre::all();
        return view('recommendor.song', ['song' => $song, 'genre' => $genre]);
    }



    public function create(Request $request)
    {
       
        $request->validate([
            'song_title' => 'required|max:255',
        ]);
    
        $artistNames = explode(',', $request->artist_name);
    
        try {
            DB::beginTransaction();
    
            $song = Song::create([
                'title' => $request->song_title,
                'album' => $request->album,
                'year' => $request->year,
                'genre_id' => $request->genre_id,
                'link'=> $request->link
            ]);
    
            foreach ($artistNames as $name) {
                $artist = Artist::firstOrCreate(['artist_name' => trim($name)]);
                $song->artists()->attach($artist->id);
            }
    
            DB::commit();
            Alert::success('Success', 'Song added successfully.');
            return redirect()->route('recommender.song');
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Error', 'Something went wrong. Try again later.');
            return redirect()->back();
        }
    }


    //Show Function:

    // public function show(int $id) {
    //     $song = song::findOrFail($id);
    //     return response()->json($song);
    // }
    

    public function showSong(Request $request){
        $songs = Song::with('artists')->get();
        //dd($songs);
        return view('admin.songs', ['song' => $songs]);
    }

    public function songDetail(Request $request, $id){
        $song = Song::with('artists')->find($id);


        // Algorithm using:
        $recommendedSongs=[];
        if($song){
            $songs= Song::latest()->where('genre_id',$song->genre_id)->get()->toArray();
        $songSimilarity = new SongSimilarity($songs);
        $similarityMatrix  = $songSimilarity->calculateSimilarityMatrix();
        $recommendedSongs = $songSimilarity->getSongsSortedBySimularity($song->id, $similarityMatrix);
        $recommendedSongIds = array_column($recommendedSongs, 'id');
        $recommended_list = Song::with('artists')->whereIn('id', $recommendedSongIds)->get();
      
        }
       
        return view('shared.song_detail',['song' => $song,'recommendedSongs'=>$recommended_list]);
    }

    public function songview(Request $request){
        $songs = Song::with('artists')->get();
        //dd($songs);
        return view('recommendor.songview', ['song' => $songs]);
    }

}
