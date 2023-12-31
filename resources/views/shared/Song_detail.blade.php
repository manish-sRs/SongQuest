@extends('layouts.app')

@section('content')

{{-- <div class="container" style="padding-bottom: 40px; padding-top:20px;">
  <form class="d-flex">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>
</div> --}}

<!-- Song details: -->
<div class="container pt-4">


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
                    <h2>Recommendation for this song</h2>
                    <table class="table table-striped table-responsive" id="recommendation_table">
                      <thead>
                          <tr>
                              <th scope="col">Number</th>
                              <th scope="col">Recommended For You:</th>
                              <th>Artists</th>
                              <th>Genre</th>
                              <th>Album</th>
                              <th>Year</th>
                              <th scope="col">Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      @php
                          $counter = 1;
                      @endphp
  
                      @foreach ($recommendedSongs as $item)
                          <tr>
                              <th scope="row">{{ $counter }}</th>
                              <td>{{$item['title']}}</td>
                              <td>@foreach ($item->artists as $artist)
                                  {{$artist->artist_name}},
                                  @endforeach</td>
                              <td>{{ $item->genre->genre_name }}</td>
                              <td>{{$item['album']}}</td>
                              <td>{{$item['year']}}</td>
                              <td><a href="{{ route('recommendation.songs.detail', ['id' => $item['id']]) }} " class="btn btn-success" >View</a></td>
                              
                              </td>
                          </tr>
                          @php
                              $counter++;
                          @endphp
                      @endforeach
   
                      </tbody>
                  </table>

                </div>







            </div>




<script>
     new DataTable('#recommendation_table');
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