@extends('layouts.app')

@section('content')

<div class="container" style="max-width: 100%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" id="card_header">
                    {{ __(' Add your recommendation here |') }}
                    
                    <button class="btn btn-warning" onClick="">My Recommendation</button>
                </div>

                <div class="card-body">
                    
                    <br><br>
                    <!-- form -->
                    <form class="needs-validation" method="post" action="{{ route('recommender.recommendation.create') }}" >
                        @csrf
                    <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">Recommendation Name</label>
                        <input class="form-control" type="text" name="recommendation_name" id=""/>
                        </div>

                        <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">Recommendation For</label>
                        <select class="form-control select2" name="recommendation_for" id="">
                            <option value="0" selected disabled>---Select---</option>
                            @foreach ($song as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                        </div><br><br>

                        <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">Recommendation 1</label>
                        <select class="form-control select2" name="recommendation_1" id="">
                            <option value="0" selected disabled>---Select---</option>
                            @foreach ($song as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                        </div>
                        

                        
                        <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">Recommendation 2</label>
                        <select class="form-control select2" name="recommendation_2" id="">
                            <option value="0" selected disabled>---Select---</option>
                            @foreach ($song as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                        </div>

                        <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">Recommendation 3</label>
                        <select class="form-control select2" name="recommendation_3" id="">
                            <option value="0" selected disabled>---Select---</option>
                            @foreach ($song as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                        </div>
                    <br>
                    <button class="btn btn-primary" type="submit">Submit recommendation</button>
                    
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
    $('.select2').select2();
});
</script>


@endsection
