@extends('layouts.app')

@section('content')
        
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto h5 mb-5">
                <div class="mb-5 ">Booking Summary</div>    
                 <form method="POST" action="{{ url('booking') }}">
                     　@csrf
                     　 <div class="form-floating mb-3">  
                        <input type="hidden" name="workshop_id" value="{{$request->workshop_id}}">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        </div>
                        
                        <div class="form-floating mb-3">  
                        <input class="form-control" type="textarea" name="" value="{{$request->workshop}}">
                        <label for="workshop">Workshop</label>
                        </div>
                        
                         <div class="form-floating mb-3">  
                        <input class="form-control" type="text" name="service" value="{{$request->service}}">
                        <label for="service">Service</label>
                        </div>
                        
                         <div class="form-floating mb-3">  
                        <input  class="form-control" type="text" name="price" value="{{$request->price}}">
                         <label for="price">Price</label>
                        </div>
                        
                         <div class="form-floating mb-3">  
                        <input class="form-control" type="text" name="datetime" value="{{$request->datetime}}">
                        <label for="datetime">Date/time</label>
                        </div>
                        
                         <div class="form-floating mb-3">  
                        <input class="form-control" type="textarea" name="location" value="{{$request->location}}">
                        <label for="location">Location</label>
                        </div>
                        
                        <input class="btn btn-primary" type="submit" value="Request">
                </form>
                </div>
            </div
        </div>
        
 @endsection
