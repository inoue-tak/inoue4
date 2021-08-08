<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    //
    public function store(Request $request)
    {
        $like = new Like();
        $like->tweet_id = $request->tweet_id;
        $like->user_id = Auth::user()->id;
        $like->save();
        return redirect('/timeline');
    }

    public function destroy(Request $request)
    {
        $like = Like::find($request->like_id);
        $like->delete();
        return redirect('/timeline');
    }

}
