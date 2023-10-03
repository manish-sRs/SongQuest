@extends('layouts.app')

@section('content')



<div class="container" style="max-width: 100%; margin-top:2%">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" id="card">
                <div class="card-header">{{ __('Dashboard   ') }}</div>

                <div class="card-body" id="card_body" >
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <button class="btn btn-warning">Get Recommendation</button>
                    <button class="btn btn-warning">Human Recommendation</button>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#myModal">My List</button>
                    <div><br><br>
                    {{$msg}}
                    <div style="color:blue;">{{ Auth::user()->name }} </div>
                    {{ __('You are logged in!') }}
                    </div><br><br><br><br><br><br> 

                    <div style="font-weight:bold; font-size:medium">* In order to get recommendation from algorithm click on "Get Recommendation."<br>
                    * And for recommendation from Recommendors click on "Human Recommendation" </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Get Recommendation -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


@endsection
