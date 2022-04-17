<?php

namespace App\Http\Controllers\Workshop;

use Illuminate\Http\Request;
use App\Models\Workshop;//この行を上に追加
use Auth;//この行を上に追加
use Validator;//この行を上に追加

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:workshop');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('workshop.home');
    }
}
