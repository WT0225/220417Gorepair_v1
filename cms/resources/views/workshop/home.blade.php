@extends('layouts.workshop')

@section('content')
 <main class="py-4">
         <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Dashboard') }}</div>
                            <div class"card-body">
                                  <div class="h2">{{Auth::guard('workshop')->user()->name}}</div>
                                  <div class="h5">{{Auth::guard('workshop')->user()->address}}</div>
                                  
                
               
                
                                  <a href="{{ url('workshopedit') }}"><button class="btn btn-primary">Shop info edit</button></a>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
            
           
@endsection