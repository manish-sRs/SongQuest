<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Genre;

class GenreController extends Controller
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

    public function index() {
        $genre = Genre::all();
        return view('admin.genre', ['genres' => $genre]);
    }

    public function create(Request $request) {
        $request->validate([
            'genre' => 'required|max:255',
        ]);

        Genre::create([
            'genre_name' => $request->genre,
        ]);

        return redirect()->route('admin.genre')->with('success', 'Genre added successfully.');
    }

    public function show(int $id) {
        $genre = Genre::findOrFail($id);
        return response()->json($genre);
    }
    
    public function update(Request $request, int $genre_id) {
        $request->validate([
            'genre' => 'required|max:255',
        ]);
    
        $genre = Genre::findOrFail($genre_id);
          $genre->genre_name = $request->genre;
         $genre->save();
    
        return redirect()->back()->with('status', 'Genre Updated Successfully');
    }
    
    public function delete(int $genre_id) {
        $genre = Genre::findOrFail($genre_id);
        $genre->delete();
        return redirect()->back()->with('status', 'Genre Deleted Successfully');
    }
    
   
}
