@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="row">
                      <h2>Search result</h2>
                     
                        @foreach ($workshops as $workshop)
                        
                        <div class="container border-primary">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h3>{{ $workshop->name }}</h3>
                                    <div class="row d-flex justify-content-space-around align-items-center">
                                        <div class="col-md-6 mb-4">
                                           
                                            <div class="mb-2"> 
                                                <h5>Distance :</h5>
                                                <div>{{ $workshop-> distance}}km</div>
                                            </div>
                                                    
                                            <h5><div>Opening time: </div></h5>
                                            <div class="row mb-2">
                                                <div class="w-25">Monday</div>
                                                <div class="w-75">{{ $workshop-> mon_open}} ~ {{ $workshop-> mon_close}}</div>
                                                
                                                <div class="w-25">Tuesday</div>
                                                <div class="w-75">{{ $workshop-> tue_open}} ~ {{ $workshop-> tue_close}}</div>
                                                
                                                <div class="w-25">Wednesday</div>
                                                <div class="w-75">{{ $workshop-> wed_open}} ~ {{ $workshop-> wed_close}}</div>
                                                
                                                 <div class="w-25">Thursday</div>
                                                <div class="w-75">{{ $workshop-> thu_open}} ~ {{ $workshop-> thu_close}}</div>
                                                
                                                 <div class="w-25">Friday</div>
                                                <div class="w-75">{{ $workshop-> fri_open}} ~ {{ $workshop-> fri_close}}</div>
                                                
                                                 <div class="w-25">Saturday</div>
                                                <div class="w-75">{{ $workshop-> sat_open}} ~ {{ $workshop-> sat_close}}</div>
                                                
                                                 <div class="w-25">Sunday</div>
                                                <div class="w-75">{{ $workshop-> sun_open}} ~ {{ $workshop-> sun_close}}</div>
                                                
                                                 <div class="w-25">Holiday</div>
                                                <div class="w-75">{{ $workshop-> hol_open}} ~ {{ $workshop-> hol_close}}</div>
                                            
                                            </div>
                                         </div>
                                         
                                         <div class="col-md-4 md-4">
                                            <h4 class="w-100">Estimated price : {{$workshop-> price}} RM</h4>
                                          
                                            <h4 class="w-100">Parts-lineup : {{$workshop-> part}}</h4>
                                              
                                         </div>
                                         
                                         <form action="{{ url('booking') }}" method="get">
                                            <input type="hidden" name="workshop_id" value="{{$workshop->id}}">
                                            <input type="hidden" name="workshop" value="{{$workshop->name}}">
                                            <input type="hidden" name="price" value="{{$workshop->price}}">
                                            <input type="hidden" name="service" value="{{$request->service}}">
                                            <input type="hidden" name="datetime" value="{{$request->datetime}}">
                                            <input type="hidden" name="location" value="{{$request->location}}">
                                            <input type="submit"  class="btn-md gap-2  btn-primary" value="Request for booking">
                                        </form>
                                  </div>   
                                </div>
                             </div>
                        </div>
                      @endforeach
            </div>
        </div>		
 @endsection
