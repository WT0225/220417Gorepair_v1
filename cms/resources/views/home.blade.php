<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
     <!--Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />

    <!-- Styles -->
    <link href="{{ asset('css/template.css') }}" rel="stylesheet">
    
    <!--JS-->
      <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
               <h1 class="masthead-heading mb-0">
                <a class="navbar-brand" href="{{ url('/') }}">GoRepair </a>
               </h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
         <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-md-10">
                        <h4 class="page-section-heading text-secondary mb-3">Profile</h4>
                            <div class="card">
                                <div class="card-body">
                              
                                    <div class="col-md-8 mx-auto">
                                    {{-- 車の画像もつけたい --}}
                                            
                                            <h2 class ="text-center">
                                            {{Auth::user()->name}}
                                            </h2>
                                    
                                             <h5 class ="text-center" >
                                            {{Auth::user()->address}}
                                            </h5>
                                        
                                         @if (count($cars) > 0)
                                       
                                            @foreach ($cars as $car)
                                            <h5 class ="text-center">{{ $car->brand }}</h5>
                                            <h5 class ="text-center">{{ $car->model }}</h5>
                                            @endforeach
                                           		
                                        @endif
                                        <div class="d-flex justify-content-center">
                                            <form action="{{ url('caredit/'.$car->id) }}" method="GET"> {{ csrf_field() }}
                                                <button type="submit" class="btn btn-primary mx-2">Car info edit </button>
                                            </form>
                                            <a href="{{ url('useredit') }}"><button class="btn btn-primary mx-2">User info edit</button></a>
                                            <a href="{{ url('carregister') }}"><button class="btn btn-primary mx-2">New car register</button></a>
                                        </div>
                                   
                                     </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          
            
            
            
           <section class="" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    
                    <div class="col-md-10 mx-auto">
                        
                         <h4 class="page-section-heading text-secondary mb-3">Maintenance Booking</h4>
                         <div class="card">
                             <div class="card-body">
                                    <form action="{{ url('result') }}" method="get">
                                     
                                        <div class="form-floating mb-3">
                                                <select class="form-select" name="service" id="service">
                                                        <option value="diagnosis">Diagnosis</option>
                                                        
                                                        <option value="battery_replacement">Battery - replacement</option>
                                                        
                                                        <option value="drive_recorder_attachment">Drive recorder - attachment</option>
                                                        
                                                        <option value="car_wash">Car wash</option>
                                                        
                                                        <option value="engine_alternater_replacement">Engine - alternater replacement</option>
                                                        
                                                        <option value="engine_oil_replacement">Engine - alternater replacement</option>
                                                        
                                                        <option value="engine_timing_belt_replacement">Engine - timing belt replacement</option>
                                                        
                                                        <option value="engine_ignition_coil_replacement">Engine - ignition coil replacement</option>
                                                        
                                                        <option value="enigne_starter_replacementt">Enigne - starter replacement</option>
                                                        
                                                        <option value="air_conditioner_filter_replacement">Air conditioner - filter replacement</option>
                                                        
                                                        <option value="air_conditioner_compressor_replacement">Air conditioner - compressor replacement</option>
                                                        
                                                        <option value="tire_replacement"> Tire - replacement</option>
                                                        
                                                        <option value="tire_puncture_repair">Tire - puncture repair</option>
                                                </select>   
                                            <label for="service" class = "">Service menu</label>
                                        </div>
                                        
                                        <div class="form-floating mb-3">
                                            <input type="datetime-local"  class="form-control" name="datetime" id="datetime">
                                            <label for="datetime">Date/Time</label>
                                            <input type="hidden" name="day" id="day" value="">
                                            <div class="invalid-feedback" data-sb-feedback="datetime:required">Required.</div>
                                        </div>
                                           
                                        <div class="form-floating mb-3">  
                                            <input type="text" class="form-control" name="location" id="location" value="">
                                            <label for="location">Location</label>
                                            <input type="hidden" id ="lon" name="lon" class="form-control" value="">
                                            <input type="hidden" id ="lat" name="lat" class="form-control" value="">
                                        </div>
                                        
                                        <input type="submit" class="btn btn-primary" value="Search">
                                    
                                    </form>
                                     <div id="main">
                                        <div id="myMap" style='width:100%;height:700px;'></div>
                                     </div>
                            </div>
                        </div>             
                    </div>
                </div>
            </div>
           </section>
        </main>
    </div>
        <script type="text/javascript">
            $("datetime").change(function(){
            let datetime = document.getElementById('datetime');
            console.log(datetime);
            let date = new Date(datetime);
            let day = date.getDay();
            console.log(day);
            });
       </script>
       <script src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AiwkIgR9Zk7lptVtL8VpD9LfWh-QjKI8WnpGLef9MSmEHNvAL7ytUU7dEd-fz8ok&setLang=en' async defer></script>
            <script>
                     let map;             //MapObject用
                     let searchManager;   //SearchObject用
                     
                     function GetMap() {
                        //Map生成
                        map = new Microsoft.Maps.Map('#myMap', {
                            zoom: 15,
                            mapTypeId: Microsoft.Maps.MapTypeId.canvasLight
                        });
                        //検索モジュール指定
                        Microsoft.Maps.loadModule('Microsoft.Maps.Search', function () {
                            //searchManagerインスタンス化（Geocode,ReverseGeocodeが使用可能にな
                            searchManager = new Microsoft.Maps.Search.SearchManager(map);
                        });
                        
                    }
        
                    document.getElementById("location").onchange = function(){
                        //4.Geocode:住所から検索
                        geocodeQuery(document.getElementById("location").value);
                    };
        
        
                     function geocodeQuery(query) {
                    if(searchManager) {
                        //住所から緯度経度を検索
                        searchManager.geocode({
                            where: query,       //検索文字列
                            callback: function (r) { //検索結果を"( r )" の変数で取得
                                //最初の検索取得結果をMAPに表示
                                if (r && r.results && r.results.length > 0) {
                                    lon= r.results[0].location.longitude;
                                    lat = r.results[0].location.latitude;
                                    document.getElementById('lon').value = lon;
                                    document.getElementById('lat').value = lat;
                                }
                            },
                            errorCallback: function (e) {
                                alert("Error");
                            }
                        });
                }
            }
        </script>
</body>

</html>





