<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\FavoriteAd;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteAdController extends Controller
{

    public function index()
    {

        $data['ads'] = FavoriteAd::join('ads', 'ad_id', '=', 'ads.id')->where('favorite_ads.user_id', Auth::id())->get();
        return view('ads.favorite.list', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function favorite(Request $request)
    {
        $favorite = new FavoriteAd();
        $favorite->ad_id = $request->post('ad_id');
        $favorite->user_id = Auth::id();

        $favorite->save();
    }




}
