@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 100%; padding-top:12px;">
    <div class="row justify-content-center">
        <div class="">
            <div class="card">
                <div class="card-header">
                <!-- Items in the header -->
                {{ __('Genre') }}
                |
                <a class="btn btn-warning" href="{{route('admin.songs')}}">Songs</a>       
                <a class="btn btn-warning" href="{{route('adminRecView')}}" >Recommendation</a>
                </div>

                <div style="font-size: larger; padding-top:12px; padding-bottom:10px; padding-left:5px">List of all the genre:</div>
                <div><button class="btn btn-primary mx-5" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Genre</button></div>

                <!-- Table showing genre -->
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $counter = 1;
                    @endphp

                    @foreach($genres as $genre)
                        <tr>
                            <th scope="row">{{ $counter }}</th>
                            <td>{{ $genre->genre_name }}</td>
                            <td>
                            <a href="#" class="btn btn-primary update-genre" data-genre-id="{{ $genre->id }}">Edit</a>
                            <!--<a href="#" class="btn btn-danger delete-genre" data-genre-id="{{ $genre->id }}">Delete</a><-->
                            </td>
                        </tr>
                        @php
                            $counter++;
                        @endphp
                    @endforeach
 
                    </tbody>
                </table>
                
                <!-- Modal code -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <form method="post" action="{{ route('admin.genre.create') }}">
                        @csrf
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="genre" class="col-form-label">Genre:</label>
                                <input type="text" class="form-control" id="genre" name="genre">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </div>
                    </form>
                    </div>
                    </div>


                    <!-- Update Modal -->
<div class="modal fade" id="genreModal" tabindex="-1" aria-labelledby="genreModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="genreModalLabel">Update Genre</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Update Form -->
                <form id="updateForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="genre">Genre:</label>
                        <input type="text" class="form-control" id="genre" name="genre">
                    </div>
                </form>

                <!-- Delete Form -->
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <p>Are you sure you want to delete this genre?</p>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="updateBtn">Update Genre</button>
                <button type="button" class="btn btn-danger" id="deleteBtn">Delete Genre</button>
            </div>
        </div>
    </div>
</div>


            </div>
        </div>
    </div>
</div>

<script>
    // Global variable to store the genre ID for update and delete operations
    let genreId;

    // When "Update" button is clicked, show the modal with the update form
    $(document).on('click', '.update-genre', function () {
        genreId = $(this).data('genre-id');

        // Fetch genre details using AJAX and update the form fields
        $.ajax({
            url: '/admin/genre/show/' + genreId,
            type: 'GET',
            success: function (data) {
                let name = data.genre_name
                $('#genreModal').modal('show').on('shown.bs.modal', function () {
                    $('#genre').val(name);
                });
            }
        });
    });

    // When "Update Genre" button inside the modal is clicked, submit the update form
    $(document).on('click', '#updateBtn', function () {
        $('#updateForm').attr('action', '/admin/genre/update/' + genreId);
        $('#updateForm').submit();
    });

    // When "Delete" button is clicked, show the modal with the delete confirmation
    $(document).on('click', '.delete-genre', function () {
        genreId = $(this).data('genre-id');
        $('#genreModal').modal('show');
    });

    // When "Delete Genre" button inside the modal is clicked, submit the delete form
    $(document).on('click', '#deleteBtn', function () {
        $('#deleteForm').attr('action', '/admin/genre/delete/' + genreId);
        $('#deleteForm').submit();
    });
</script>




@endsection
