<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->middleware('auth');
        return view('home');
    }

    public function landingpage(Ad $ad)
    {
        $data['pop_ads'] = Ad::orderByDesc('views', $ad->views)->limit(4)->get();
        $data['new_ads'] = Ad::orderByDesc('created_at', $ad->views)->limit(4)->get();
        return view('landingpage', $data);
    }
}
