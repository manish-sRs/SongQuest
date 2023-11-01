@extends('layouts.app')

@section('content')

<div class="container" style="padding-bottom: 40px; padding-top:20px;">
  <form class="d-flex">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>
</div>

<!--
<div class="container" style="max-width: 100%; border: 4px solid ; border-radius: 5px;">
    <div class="container justify-content-center align-items-center">
        <div>
            <div class="row">
                <div class="col-6">
                    <label for="">Song Title</label>
                    <p>{{ $song->title }}</p>
                </div>

                <div class="col-6">
                    <label for="">Artist</label>
                    <p>@foreach ($song->artists as $artist)
                        {{$artist->artist_name}},
                      @endforeach</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-6">Album
                    <p>{{ $song->album }}</p>
                </div>
                <div class="col-6">Genre
                    <p>{{ $song->genre->genre_name }}</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-6">Year
                    <p>{{ $song->year }}</p>
                </div>
                
            </div>

        </div>
    </div>
    
</div>

-->

<!-- Song details: -->

                <div class="card-body">
                
                  
                    
                    <table class="table table-responsive" style="border-radius: 5px;">
                    <thead>
                        <tr style="padding-left: 10px;">
                            <th scope="col">Song Title</th>
                            <th scope="col">Artists</th>
                            <th scope="col">Album</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Year</th>
                            <th scope="col">Youtube</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <tr>
                            <td>{{ $song->title }}</td> 
                            <td>@foreach ($song->artists as $artist)
                                    {{$artist->artist_name}},
                                @endforeach
                            </td>
                            <td>{{ $song->album }}</td>
                            <td>{{ $song->genre->genre_name }}</td>
                            <td> {{ $song->year }}</td>
                            <td>@if($song->link)
                                     <div id="youtube-video"></div>
                                @endif</td>
                    </tr>
                    
                    </tbody>
                    </table>

                </div>












<script>
    // YouTube video URL
  var youtubeUrl = '{{ $song->link }}';

  // Extract video ID using regular expression
  var videoId = youtubeUrl.match(/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/)[1];

  // Embed the YouTube video dynamically
   // Check if the video is available
   fetch('https://www.youtube.com/oembed?url=https://www.youtube.com/watch?v=' + videoId)
    .then(response => {
      if (response.ok) {
        return response.json();
      } else {
        throw new Error('Video not available');
      }
    })
    .then(data => {
      // If the video is available, embed it
      var iframe = document.createElement('iframe');
      iframe.width = '560';
      iframe.height = '315';
      iframe.src = 'https://www.youtube.com/embed/' + videoId+ '?&mute=1';
      iframe.frameBorder = '0';
      iframe.gesture='media'
     
      iframe.allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share'
      iframe.allowFullscreen = true;
      document.getElementById('youtube-video').appendChild(iframe);
    })
    .catch(error => {
      // If the video is not available, display a custom message
      document.getElementById('youtube-video').textContent = 'This video is not available.';
    });
</script>

@endsection