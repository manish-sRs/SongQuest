<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Song Quest') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    



  
</head>
<body >
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg- shadow-sm " id="navbar_1">
            <div class="container" id="navbar_container">

                <!-- Go to home configuration! -->
                <!-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Music Recommendation System') }}
                </a> -->
                
                <a id="app_name" href='/' >  SongQuest </a>
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> -->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    
                    <!-- <ul class="navbar-nav me-auto">
                    
                    </ul> -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <!-- button logout -->
                            <button class="btn btn-danger" type="submit" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Log Out</button>
                            <!-- Profile button -->                         
                            <div id="profile_btn">
                                @if(Auth::user()->role == "user")
                                  <a class="btn btn-dark" > {{ Auth::user()->name }} </a>
                                @elseif(Auth::user()->role == "recommender")
                                  <a class="btn btn-dark"  href="{{ route('recommender.profile',['id'=>Auth::user()->id])}}"> {{ Auth::user()->name }} </a>
                                @elseif(Auth::user()->role == "admin")
                                <a class="btn btn-dark"  href="{{ route('admin.profile',['id'=>Auth::user()->id])}}"> {{ Auth::user()->name }} </a>
                              @endif
                                
                               
                             </div>
                            
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>

            @yield('content')

            
@include('sweetalert::alert')

    <!-- <footer class="bg-dark text-center text-white" style="position: relative;
       bottom: 0; width: 100%;">
        
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2023 Copyright: 
    <a class="text-white" href="/">Song Quest</a>
  </div>

    </footer> -->

    
</body>
</html>
