<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Ad;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function comment(StoreCommentRequest $request)
    {
        $comment = new Comment();

        $comment->content = $request->post('content');
        $comment->user_id = Auth::id();
        $comment->ad_id = 2;

        $comment->save();
    }



}
