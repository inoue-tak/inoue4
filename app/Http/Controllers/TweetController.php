<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tweet;

class TweetController extends Controller
{
    //
    public function showTimelinePage()
    {
        $tweets = Tweet::latest()->simplePaginate(2);
        return view('timeline', ['tweets' => $tweets]);
    }

    public function postTweet(Request $request)
    {
        /* dd($request); */

        $validator = $request->validate([
            'tweet' => ['required', 'string', 'max:280'],
        ]);

        Tweet::create([
            'user_id' => Auth::user()->id,
            'tweet' => $request->tweet,
        ]);

        return back();
    }

    public function destroy($id)
    {
        $tweet = Tweet::find($id);
        $tweet->delete();

        return redirect()->route('timeline');
    }
}
