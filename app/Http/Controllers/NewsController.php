<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\News;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{
    public function index()
{
    $news = News::all();
    return view('admin.news', compact('news'));
}

public function create()
{

    return view('admin.create');
}

public function store(Request $request)
{
    $userId = Auth::id();
    $newsData = $request->all();
    $newsData['user_id'] = $userId;

    // Handle the image upload
    if ($request->hasFile('news_image')) {
        $image = $request->file('news_image');
        $filename = time() . '.' . $image->getClientOriginalExtension();

        // Define the path to the directory
        $path = public_path('images/');

        // Check if the directory exists, if not, create it
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // Save the image in the specified directory
        Image::make($image)->resize(800, 400)->save($path . $filename);

        $newsData['news_image'] = $filename;
    }

    $news = News::create($newsData);
    return redirect()->route('admin.news');
}


public function show(News $news)
{
    return view('admin.news.show', compact('news'));
}

public function edit($id)
{
    
    $news= News::find($id);
    return view('admin.edit', compact('news'));
}

public function update(Request $request)
{
    $news= News::find($request->id);
    $news->update($request->all());
    return redirect()->route('admin.news');
}

public function destroy(News $news)
{
    $news->delete();
    return redirect()->route('admin.news');
}

}
