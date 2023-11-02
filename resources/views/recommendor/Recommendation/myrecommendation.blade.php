@extends('layouts.app')

@section('content')

<div class="container" style="max-width: 100%;">
    <div class="row justify-content-center">
        <div class="">
            <div class="card">
                <div class="card-header" id="card_header">
                <a href="{{ route('recommender.song') }}" class="btn btn-warning" >Add a song</a>
                    <a href="{{ route('recommender.recommendation') }}" class="btn btn-warning" >Recommend a song </a>
                    <button class="btn btn-warning" onclick="">Algorithm Recommendation</button>
                    
                    <a class="btn btn-warning" href="{{route('recommender.songview')}}">Songs</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ Auth::user()->name ,}}
                    {{ __('You are logged in!') }}
                    <br><br>
                    
                    <table class="table table-responsive" id="myrecommendation_table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Recommendation Name</th>
                            <th scope="col">song</th>
                            <th scope="col">Recommendation 1</th>
                            <th scope="col">Recommendation 2</th>
                            <th scope="col">Recommendation 3</th>
                            <th scope="col">Description</th>
                            <th scope="col">User</th>
                            <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $counter = 1;
                    @endphp

                    @foreach($recommendations as $recommendation)
                        <tr>
                            <th scope="row">{{ $counter }}</th>
                            <td>{{ $recommendation->recommendation_name }}</td> 
                            <td>{{ $recommendation->recommendation_for_name }}</td>
                            <td>{{ $recommendation->recommendation_1_name }}</td>
                            <td>{{ $recommendation->recommendation_2_name }}</td>
                            <td>{{ $recommendation->recommendation_3_name }}</td>
                            <td>{{ $recommendation->description}}</td>
                            <td>{{ $recommendation->user->name }}</td>
                            <td>  
                             <button type="button" class="btn btn-primary update-rec" data-bs-toggle="modal" data-bs-target="#myModal" 
                                data-recommendation-id="{{ $recommendation->id }}" 
                                data-recommendation-name="{{ $recommendation->recommendation_name }}"
                                data-song="{{ $recommendation->rec_for_id }}"
                                data-rec1="{{ $recommendation->rec_1_id }}"
                                data-rec2="{{ $recommendation->rec_2_id }}"
                                data-rec3="{{ $recommendation->rec_3_id }}"
                                data-description="{{ $recommendation->description }}"
                                data-user="{{ $recommendation->user->name }}"
                             >
                                 Edit
                             </button>
                                <a href="{{ route('recommendation.delete', ['id' => $recommendation->id])}}" class="btn btn-primary update-rec" >delete</a>
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
        </div>
    </div>
</div>


<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit My Recommendation</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <form class="needs-validation" method="post" action="{{ route('recommendation.edit')}}" >
                @csrf
                <input type="hidden" name="id">
            <div class="row">
               <div class="col-md-6 mb-3">
                  <label for="validationTooltip01">Recommendation Name</label>
                  <input class="form-control" type="text" name="recommendation_name" id=""/>
               </div>
            
                <div class="col-md-6 mb-3">
                     <label for="validationTooltip01">Recommendation For</label>
                     <select class="form-control select2" name="recommendation_for"  id="songSelect1">
                       <option value="0" selected disabled>---Select---</option>
                        @foreach ($song as $item)
                        <option value="{{ $item->id }}" data-artist="@foreach($item->artists as $artist)
                            {{$artist->artist_name}}, 
                            @endforeach
                            ">{{ $item->title }}</option>
                        @endforeach
                     </select>
                    <div class="text-success" id="artistName1"></div>
                </div>
            </div>
                <div class="col-md-6 mb-3">
                <label for="validationTooltip01">Recommendation 1</label>
                <select class="form-control select2" name="recommendation_1" id="songSelect2">
                    <option value="0" selected disabled>---Select---</option>
                    @foreach ($song as $item)
                        <option value="{{ $item->id }}" data-artist="@foreach($item->artists as $artist)
                            {{$artist->artist_name}}, 
                            @endforeach
                            ">{{ $item->title }}</option>
                    @endforeach
                </select>
                <div class="text-success" id="artistName2"></div>

                </div>
                

                
                <div class="col-md-6 mb-3">
                  <label for="validationTooltip01">Recommendation 2</label>
                  <select class="form-control select2" name="recommendation_2"  id="songSelect3">
                    <option value="0" selected disabled>---Select---</option>
                    @foreach ($song as $item)
                    <option value="{{ $item->id }}" data-artist="@foreach($item->artists as $artist)
                        {{$artist->artist_name}}, 
                        @endforeach
                        ">{{ $item->title }}</option>
                    @endforeach
                  </select>
                  <div class="text-success" id="artistName3"></div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="validationTooltip01">Recommendation 3</label>
                    <select class="form-control select2" name="recommendation_3" id="songSelect4">
                        <option value="0" selected disabled>---Select---</option>
                        @foreach ($song as $item)
                            <option value="{{ $item->id }}" data-artist="@foreach($item->artists as $artist)
                                {{$artist->artist_name}}, 
                                @endforeach
                                ">{{ $item->title }}</option>
                        @endforeach
                    </select>
                     <div class="text-success" id="artistName4"></div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="" rows="3"></textarea>
                  </div>
            <br>
            <button class="btn btn-primary" type="submit">Update recommendation</button>
            
            </form>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
  
      </div>
    </div>
  </div>

<script>
        $(document).ready(function() {
    $('.select2').select2();
});
$(document).ready(function () {
        $('#songSelect1, #songSelect2, #songSelect3,  #songSelect4').change(function () {
            var selectedSong = $(this).find('option:selected');
            var artistNames = selectedSong.data('artist');
            var targetDivId = $(this).attr('id').replace('songSelect', 'artistName');
            $('#' + targetDivId).text('Artist: ' + artistNames);
        });
    });

    $(document).ready(function(){
    $('.update-rec').on('click', function(event) {
        var button = $(event.target);
        
        // Get data attributes from the clicked button
        var recommendationId = button.data('recommendation-id');
        var recommendationName = button.data('recommendation-name');
        var song = button.data('song');
        var rec1 = button.data('rec1');
        var rec2 = button.data('rec2');
        var rec3 = button.data('rec3');
        var description = button.data('description');
        var user = button.data('user');
       
        
       
        // Populate form fields with the retrieved data
        $('#myModal').find('input[name="id"]').val(recommendationId);
        $('#myModal').find('input[name="recommendation_name"]').val(recommendationName);
        $('#myModal').find('select[name="recommendation_for"]').val(song);
        $('#myModal').find('select[name="recommendation_1"]').val(rec1);
        $('#myModal').find('select[name="recommendation_2"]').val(rec2);
        $('#myModal').find('select[name="recommendation_3"]').val(rec3);
        $('#myModal').find('textarea[name="description"]').val(description);
        $('#myModal').find('input[name="user"]').val(user);

        // Set the form action URL dynamically based on recommendationId
       
    });
});

    new DataTable('#myrecommendation_table');

</script>

@endsection