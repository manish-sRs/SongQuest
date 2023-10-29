@extends('layouts.app')

@section('content')

<div class="container" >
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
                @if($song->link)
                <div class="col-6">Youtube
                    <p>
                        <div id="youtube-video"></div>
                    </p>
                </div>
                @endif
            </div>
        </div>
    </div>
    
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