<?php

use Illuminate\Support\Facades\Route;
use App\Models\Workshop;
use App\Models\Service;
use App\Models\User;
use App\Models\Car;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// ユーザー情報編集画面に遷移する処理
Route::get('/useredit', function () {
    return view('useredit', ['user' => Auth::user()]);
});




// ユーザー情報を更新するときの処理
Route::post('userupdate', function (Request $request) {
    // Eloquent モデル
    $users = User::find($request->id);
    $users->name = $request->name;
    $users->email = $request->email;
    $users->address = $request->address;
    $users->save(); 
    return redirect('/home');
});


// 車情報登録画面への遷移処理
Route::get('/carregister', function () {
    return view('carregister', ['user' => Auth::user()]);
});


// 車情報登録処理
Route::post('carregister', function (Request $request) {
    // Eloquent モデル
    $cars = new Car;
    $cars->user_id = $request->user_id;
    $cars->brand = $request->brand;
    $cars->model = $request->model;
    $cars->variant = $request->variant;
    $cars->color = $request->color;
    $cars->year = $request->year;
    $cars->save(); 
    return redirect('/home');
});

// 車情報更新画面への遷移処理
Route::get('/caredit/{car}', function (Car $car) {
    return view('caredit', ['car' => $car]);
});

//車更新処理
Route::post('carupdate',function(Request $request){
    $cars = Car::find($request->id);
    $cars->user_id = $request->user_id;
    $cars->brand = $request->brand;
    $cars->model = $request->model;
    $cars->variant = $request->variant;
    $cars->color = $request->color;
    $cars->year = $request->year;
    $cars->save(); 
    return redirect('/home');
});


// 整備工場検索処理
Route::get('/result', function (Request $request) {
   $workshops =  DB::table('workshops') -> 
           selectRaw(
                     "id,name,tel,
                     mon_open,mon_close,
                     tue_open,tue_close,
                     wed_open,wed_close,
                     thu_open,thu_close,
                     fri_open,fri_close,
                     sat_open,sat_close,
                     sun_open,sun_close,
                     hol_open,hol_close,
                     $request->service AS price,
                     part,
                     GLENGTH(
                            GEOMFROMTEXT( CONCAT( 'LineString($request->lon $request->lat,', X( location ) , ' ' , Y( location ) ,  ')' ) )
                                 ) * 112.12 
                          AS distance"
                    )
            ->orderBy('distance', 'ASC')//遠い順、近い順
            ->limit(20)
            ->get();
    return view('result', ['workshops' => $workshops, 'request'=>$request]); 
});


// 予約リクエスト画面遷移

Route::get('/booking', function (Request $request) {
    return view('booking', ['request'=>$request,'user' => Auth::user()]); 
});

// 予約リクエスト登録

Route::post('booking', function (Request $request) {
    $bookings = new Booking;
    $bookings->workshop_id = $request->workshop_id;
    $bookings->user_id = $request->user_id;
    $bookings->service = $request->service;
    $bookings->price = $request->price;
    $bookings->location = $request->location;
    $bookings->datetime = $request->datetime;
    $bookings->save(); 
    return redirect('/home');
});





// 整備工場用↓↓
// 整備工場ログイン認証

Route::group(['prefix' => 'workshop'], function(){

//home
    Route::get('home',[App\Http\Controllers\Workshop\HomeController::class, 'index'])->name('workshop.home');
//login logout   
    Route::get('login', [App\Http\Controllers\Workshop\LoginController::class, 'showLoginForm'])->name('workshop.login');
    Route::post('login', [App\Http\Controllers\Workshop\LoginController::class, 'login'])->name('workshop.login');
    Route::post('logout', [App\Http\Controllers\Workshop\LoginController::class, 'logout'])->name('workshop.logout');
//register
    Route::get('register', [App\Http\Controllers\Workshop\RegisterController::class, 'showRegisterForm'])->name('workshop.register');
    Route::post('register',[App\Http\Controllers\Workshop\RegisterController::class, 'register'])->name('workshop.register');

});


// 整備工場情報編集画面に遷移する処理
Route::get('/workshopedit', function () {
    return view('workshopedit', ['workshop' => Auth::guard('workshop')->user()]);
});




// 整備工場情報を更新するときの処理
Route::post('workshopedit', function (Request $request) {
    // Eloquent モデル
    $workshops = Workshop::find($request->id);
    $workshops->name = $request->workshop;
    $workshops->email = $request->email;
    $workshops->tel = $request->tel;
    $workshops->mon_open = $request->mon_open;
    $workshops->mon_close = $request->mon_close;
    $workshops->tue_open = $request->tue_open;
    $workshops->tue_close = $request->tue_close; 
    $workshops->wed_open = $request->wed_open;
    $workshops->wed_close = $request->wed_close;
    $workshops->thu_open = $request->thu_open;
    $workshops->thu_close = $request->thu_close;
    $workshops->fri_open = $request->fri_open;
    $workshops->fri_close = $request->fri_close;
    $workshops->sat_open = $request->sat_open;
    $workshops->sat_close = $request->sat_close;
    $workshops->sun_open = $request->sun_open;
    $workshops->sun_close = $request->sun_close;
    $workshops->hol_open = $request->hol_open;
    $workshops->hol_close = $request->hol_close;
    
    $workshops->address = $request->address;
    $workshops->location =  DB::raw('ST_GeomFromText("'.'POINT('.$request->lon.' '.$request->lat.')")');
    
    $workshops->diagnosis = $request->diagnosis;
    $workshops->battery_replacement = $request->battery_replacement;
    $workshops->drive_recorder_attachment = $request->drive_recorder_attachment;
    $workshops->car_wash = $request->car_wash;
    $workshops->engine_alternater_replacement = $request->engine_alternater_replacement;
    $workshops->engine_oil_replacement = $request->engine_oil_replacement;
    $workshops->engine_timing_belt_replacement = $request->engine_timing_belt_replacement;
    $workshops->engine_ignition_coil_replacement = $request->engine_ignition_coil_replacement;
    $workshops->enigne_starter_replacement = $request->enigne_starter_replacement;
    $workshops->air_conditioner_filter_replacement = $request->air_conditioner_filter_replacement;
    $workshops->air_conditioner_compressor_replacement = $request->air_conditioner_compressor_replacement;
    $workshops->tire_replacement = $request->tire_replacement;
    $workshops->tire_puncture_repair = $request->tire_puncture_repair;
    $workshops->part = $request->part;
    
    $workshops->save(); 
    return redirect('workshop/home');
});








// // サービス登録画面への遷移処理
// Route::get('/serviceregister', function () {
//     return view('serviceregister', ['workshop' => Auth::guard('workshop')->user()]);
// });


// // サービス情報登録処理
// Route::post('serviceregister', function (Request $request) {
//     // Eloquent モデル
//     $services = new Service;
//     $services->workshop_id = $request->workshop_id;
//     $services->name = $request->name;
//     $services->price = $request->price;
//     $services->part = $request->part;
//     $services->save(); 
//     return redirect('workshop/home');
// });


























// 整備工場新規登録画面に遷移する処理
Route::get('/workshopregister', function () {
    return view('workshopregister');
});

// 整備工場を新規登録する際の処理
Route::post('workshopregister', function (Request $request) {
    DB::table('workshops')->insert([
           [
            'pw' => $request->pw,
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'address' => $request->address,
            'location' => DB::raw("ST_GeomFromText('POINT($request->lat $request->lon)')"),
            ]
        ]);
    return redirect('workshophome');
});


// 整備工場むけホーム画面遷移
Route::get('/workshophome', function () {
    return view('workshophome');
});

