<?php

namespace App\Http\Controllers\Workshop;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Workshop;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/workshop/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:workshop');
    }

    public function showRegisterForm()
    {
           return view('workshop.auth.register');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:workshops'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tel' => ['required', 'string', 'max:30'],
            'address' => ['required', 'string', 'max:300'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
     protected function create( array $data)
    {
          return Workshop::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'tel' => $data['tel'],
            'mon_open' => $data['mon_open'],
            'mon_close' => $data['mon_close'],
            'tue_open' => $data['tue_open'],
            'tue_close' => $data['tue_close'],
            'wed_open' => $data['wed_open'],
            'wed_close' => $data['wed_close'],
            'thu_open' => $data['thu_open'],
            'thu_close' => $data['thu_close'],
            'fri_open' => $data['fri_open'],
            'fri_close' => $data['fri_close'],
            'sat_open' => $data['sat_open'],
            'sat_close' => $data['sat_close'],
            'sun_open' => $data['sun_open'],
            'sun_close' => $data['sun_close'],
            'hol_open' => $data['hol_open'],
            'hol_close' => $data['hol_close'],
            'address' => $data['address'],
            'location' => DB::raw('ST_GeomFromText("'.'POINT('.$data["lon"].' '.$data["lat"].')")'),
            'diagnosis' => $data['diagnosis'],
            'battery_replacement' => $data['battery_replacement'],
            'drive_recorder_attachment' => $data['drive_recorder_attachment'],
            'car_wash' => $data['car_wash'],
            'engine_alternater_replacement' => $data['engine_alternater_replacement'],
            'engine_oil_replacement' => $data['engine_oil_replacement'],
            'engine_timing_belt_replacement' => $data['engine_timing_belt_replacement'],
            'engine_ignition_coil_replacement' => $data['engine_ignition_coil_replacement'],
            'enigne_starter_replacement' => $data['enigne_starter_replacement'],
            'air_conditioner_filter_replacement' => $data['air_conditioner_filter_replacement'],
            'air_conditioner_compressor_replacement' => $data['air_conditioner_compressor_replacement'],
            'tire_replacement' => $data['tire_replacement'],
            'tire_puncture_repair' => $data['tire_puncture_repair'],
            'part' => $data['part'],
            
        ]);
         
    }
    
    
    
    protected function guard()
    {
        return \Auth::guard('workshop');
    }
    
}
