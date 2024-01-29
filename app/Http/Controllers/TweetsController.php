<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use App\Models\Tweet;
use App\Services\TweetService;


class TweetsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $tweetService = new TweetService();
        $tweets = $tweetService->getTweets();
        //dd($tweets);
        
        return view('tweet.index',[
            'tweets'=>$tweets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        Lang::setLocale('ja');
        $request->validate([
            'content' => 'required|max:20',
        ]);

        $tweet = new Tweet;
        $tweet->content = $request->content;
        $tweet->user_id = Auth::user()->id;
        $tweet->save();

        return redirect('tweets');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $tweet = Tweet::where('id',$request->tweetId)->firstOrFail();
        return view('tweet.edit',['tweet'=>$tweet]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tweet = Tweet::find($id);
        $tweet->content = $request->content;
        $tweet->save();

        return redirect()->route('tweet.edit',['tweetId'=>$tweet->id])
            ->with('tweet.update.success',"編集が完了しました");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tweet = Tweet::destroy($id);
        
        return redirect()->route('tweet.index')->with('tweet.delete.success',"削除しました");
    }
}
