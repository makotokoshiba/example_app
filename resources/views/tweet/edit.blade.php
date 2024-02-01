@extends('layouts.app')

@section('content')
        <h1>編集</h1>
        <a href="{{ route('tweet.index') }}">戻る</a>
        <div>
            <p>投稿フォーム</p>
            @if(session('tweet.update.success'))
                <p style="color:green">{{ session('tweet.update.success') }}</p>
            @endif
            <form action="{{ route('tweet.update',['tweetId'=>$tweet->id]) }}" method="post">
                @method('PUT')
                @csrf
                <label for="tweet_content"> つぶやき</label>
                <span>20文字まで</span>
                <div id='app'>
            <user></user> 
        </div>
                <textarea id="tweet-content" type="text" name="content" placeholder="入力してください">{{ $tweet->content }}</textarea>
                @error('content')
                    <p style="color:red;">{{$message}}</p>
                @enderror
                <button type="submit">編集</button>
            </form>
        </div>
@endsection