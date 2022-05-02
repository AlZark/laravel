<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserPanelController extends Controller
{

    public function __constructor()
    {
        $this->middleware('auth');
    }

    public static function myAds()
    {
        $id = Auth::id();
        $data['ads'] = Ad::where('user_id', $id)->get();
        return view('user-panel.ads', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function myAccount(User $user)
    {
        $data['user'] = Auth::user();
        return view('user-panel.account', $data);
    }
}
