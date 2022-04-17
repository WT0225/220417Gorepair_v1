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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!--JS-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
   
   
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    GoRepair for workshop
                </a>
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
                                    <a class="nav-link" href="{{ route('workshop.login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('workshop.register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('workshop.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('workshop.logout') }}" method="POST" class="d-none">
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
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Register') }}</div>
        
                            <div class="card-body">
                            <form method="POST" action="{{ route('workshop.register') }}">
                                @csrf
        
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Workshop name') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="Test Motors" required autocomplete="name" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="test@gmail.com" required autocomplete="email">
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                
                                
                                
                                 <div class="row mb-3">
                                    <label for="tel" class="col-md-4 col-form-label text-md-end">{{ __('Telephone Number') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="00000000" required autocomplete="tel">
        
                                        @error('tel')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="opening time" class="col-md-4 col-form-label text-md-end">{{ __('Opening time') }}</label>
        
                                    <div class="col-md-6">
                                        <label for="Monday" class="col-md-4 col-form-label text-md-end">{{ __('Monday') }}</label>
                                        <input id="mon_open" type="time" class="form-control"  name="mon_open" required autocomplete="mon_open" value="09:00" >~<input id="mon_close" type="time" class="form-control" name="mon_close"  required autocomplete="mon_close" value="17:00">
                                        
                                        <label for="Tuesday" class="col-md-4 col-form-label text-md-end">{{ __('Tuesday') }}</label>
                                        <input id="tue_open" type="time" class="form-control" name="tue_open"  required autocomplete="tue_open" value="09:00" >~<input id="tue_close" type="time" class="form-control" name="tue_close"  required autocomplete="tue_close" value="17:00">
                                        
                                        <label for="Wednesday" class="col-md-4 col-form-label text-md-end">{{ __('Wednesday') }}</label>
                                        <input id="wed_open" type="time" class="form-control"  name="wed_open"  required autocomplete="wed_open" value="09:00" >~<input id="wed_close" type="time" class="form-control" name="wed_close"  required autocomplete="wed_close" value="17:00">
                                        
                                        <label for="Thursday" class="col-md-4 col-form-label text-md-end">{{ __('Thursday') }}</label>
                                        <input id="thu_open" type="time" class="form-control" name="thu_open"  required autocomplete="thu_open" value="09:00" >~<input id="thu_close" type="time" class="form-control" name="thu_close"  required autocomplete="thu_close" value="17:00">
                                        
                                        <label for="Friday" class="col-md-4 col-form-label text-md-end">{{ __('Friday') }}</label>
                                        <input id="fri_open" type="time" class="form-control"  name="fri_open"  required autocomplete="fri_open" value="09:00">~<input id="fri_close" type="time" class="form-control" name="fri_close"  required autocomplete="fri_close" value="17:00">
                                        
                                        <label for="Saturday" class="col-md-4 col-form-label text-md-end">{{ __('Saturday') }}</label>
                                        <input id="sat_open" type="time" class="form-control" name="sat_open"  required autocomplete="sat_open" value="09:00">~<input id="sat_close" type="time" class="form-control" name="sat_close"  required autocomplete="sat_close" value="17:00">
                                        
                                        <label for="Sunday" class="col-md-4 col-form-label text-md-end">{{ __('Sunday') }}</label>
                                        <input id="sun_open" type="time" class="form-control"  name="sun_open"  required autocomplete="sun_open" value="09:00">~<input id="sun_close" type="time" class="form-control" name="sun_close"  required autocomplete="sun_close" value="17:00">
                                        
                                        <label for="Holiday" class="col-md-4 col-form-label text-md-end">{{ __('Holiday') }}</label>
                                        <input id="hol_open" type="time" class="form-control" name="hol_open"  required autocomplete="hol_open" value="09:00">~<input id="hol_close" type="time" class="form-control" name="hol_close"  required autocomplete="hol_close" value="17:00">
                          
                                    </div>
                                </div>
                                
                                
                                 <div class="row mb-3">
                                    <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="" required autocomplete="address">
                            
                                        <input type="hidden" id ="lon" name="lon" class="form-control" value="">
                                        <input type="hidden" id ="lat" name="lat" class="form-control" value="">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                       
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="diagnosis" class="col-md-4 col-form-label text-md-end">{{ __('Price for diagnosis(RM) ') }}</label>
                                    <div class="col-md-6">
                                        <input id="diagnosis" type="text" class="form-control @error('diagnosis') is-invalid @enderror" name="diagnosis" value="100" required autocomplete="diagnosis">
                                        @error('diagnosis')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="battery_replacement" class="col-md-4 col-form-label text-md-end">{{ __('Price for battery_replacement(RM) ') }}</label>
                                    <div class="col-md-6">
                                        <input id="battery_replacement" type="text" class="form-control @error('battery_replacement') is-invalid @enderror" name="battery_replacement" value="100" required autocomplete="battery_replacement">
                                        @error('battery_replacement')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                 <div class="row mb-3">
                                    <label for="drive_recorder_attachment" class="col-md-4 col-form-label text-md-end">{{ __('Price for drive_recorder_attachment(RM) ') }}</label>
                                    <div class="col-md-6">
                                        <input id="drive_recorder_attachment" type="text" class="form-control @error('drive_recorder_attachment') is-invalid @enderror" name="drive_recorder_attachment" value="100" required autocomplete="drive_recorder_attachment">
                                        @error('drive_recorder_attachment')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                 <div class="row mb-3">
                                    <label for="car_wash" class="col-md-4 col-form-label text-md-end">{{ __('Price for car_wash(RM) ') }}</label>
                                    <div class="col-md-6">
                                        <input id="car_wash" type="text" class="form-control @error('car_wash') is-invalid @enderror" name="car_wash" value="100" required autocomplete="car_wash">
                                        @error('car_wash')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                 <div class="row mb-3">
                                    <label for="engine_alternater_replacement" class="col-md-4 col-form-label text-md-end">{{ __('Price for engine_alternater_replacement(RM) ') }}</label>
                                    <div class="col-md-6">
                                        <input id="engine_alternater_replacement" type="text" class="form-control @error('engine_alternater_replacement') is-invalid @enderror" name="engine_alternater_replacement" value="100" required autocomplete="engine_alternater_replacement">
                                        @error('engine_alternater_replacement')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="engine_oil_replacement" class="col-md-4 col-form-label text-md-end">{{ __('Price for engine_oil_replacement(RM) ') }}</label>
                                    <div class="col-md-6">
                                        <input id="engine_oil_replacement" type="text" class="form-control @error('engine_oil_replacement') is-invalid @enderror" name="engine_oil_replacement" value="100" required autocomplete="engine_oil_replacement">
                                        @error('engine_oil_replacement')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="engine_timing_belt_replacement" class="col-md-4 col-form-label text-md-end">{{ __('Price for engine_timing_belt_replacement(RM) ') }}</label>
                                    <div class="col-md-6">
                                        <input id="engine_timing_belt_replacement" type="text" class="form-control @error('engine_timing_belt_replacement') is-invalid @enderror" name="engine_timing_belt_replacement" value="100" required autocomplete="engine_timing_belt_replacement">
                                        @error('engine_timing_belt_replacement')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="engine_ignition_coil_replacement" class="col-md-4 col-form-label text-md-end">{{ __('Price for engine_ignition_coil_replacement(RM) ') }}</label>
                                    <div class="col-md-6">
                                        <input id="engine_ignition_coil_replacement" type="text" class="form-control @error('engine_ignition_coil_replacement') is-invalid @enderror" name="engine_ignition_coil_replacement" value="100" required autocomplete="engine_ignition_coil_replacement">
                                        @error('engine_ignition_coil_replacement')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="enigne_starter_replacement" class="col-md-4 col-form-label text-md-end">{{ __('Price for enigne_starter_replacement(RM) ') }}</label>
                                    <div class="col-md-6">
                                        <input id="enigne_starter_replacement" type="text" class="form-control @error('enigne_starter_replacement') is-invalid @enderror" name="enigne_starter_replacement" value="100" required autocomplete="enigne_starter_replacement">
                                        @error('enigne_starter_replacement')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="air_conditioner_filter_replacement" class="col-md-4 col-form-label text-md-end">{{ __('Price for air_conditioner_filter_replacement(RM) ') }}</label>
                                    <div class="col-md-6">
                                        <input id="air_conditioner_filter_replacement" type="text" class="form-control @error('air_conditioner_filter_replacement') is-invalid @enderror" name="air_conditioner_filter_replacement" value="100" required autocomplete="air_conditioner_filter_replacement">
                                        @error('air_conditioner_filter_replacement')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="air_conditioner_compressor_replacement" class="col-md-4 col-form-label text-md-end">{{ __('Price for air_conditioner_compressor_replacement(RM) ') }}</label>
                                    <div class="col-md-6">
                                        <input id="air_conditioner_compressor_replacement" type="text" class="form-control @error('air_conditioner_compressor_replacement') is-invalid @enderror" name="air_conditioner_compressor_replacement" value="100" required autocomplete="air_conditioner_compressor_replacement">
                                        @error('air_conditioner_compressor_replacement')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="tire_replacement" class="col-md-4 col-form-label text-md-end">{{ __('Price for tire_replacement(RM) ') }}</label>
                                    <div class="col-md-6">
                                        <input id="tire_replacement" type="text" class="form-control @error('tire_replacement') is-invalid @enderror" name="tire_replacement" value="100" required autocomplete="tire_replacement">
                                        @error('tire_replacement')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="tire_puncture_repair" class="col-md-4 col-form-label text-md-end">{{ __('Price for tire_puncture_repair(RM) ') }}</label>
                                    <div class="col-md-6">
                                        <input id="tire_puncture_repair" type="text" class="form-control @error('tire_puncture_repair') is-invalid @enderror" name="tire_puncture_repair" value="100" required autocomplete="tire_puncture_repair">
                                        @error('tire_puncture_repair')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="part" class="col-md-4 col-form-label text-md-end">{{ __('Parts linup') }}</label>
                                    <div class="col-md-6">
                                        <select name="part" id="part">
                                            <option value="genuine">Genuine</option>
                                            <option value="local">Local</option>
                                            <option value="genuine/local">Genuine/Local</option>
                                        </select>
                                       
                                    </div>
                                </div>
                                
                                
                                
                    
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                             <div id="main">
                                 <div id="myMap" style='width:800px;height:500px;'></div>
                             </div>
                            
                        </div>
                    </div>
                </div>
            </div>
         </div>
        </main>
    </div>
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
    
                document.getElementById("address").onchange = function(){
                    //4.Geocode:住所から検索
                    geocodeQuery(document.getElementById("address").value);
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





