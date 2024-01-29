<!doctype html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width,user-scalable=no,inital-scale=1.0,
            maximum-scale=1.0,minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>つぶやきアプリ</title>
    </head>

    <body>
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
                <textarea id="tweet-content" type="text" name="content" placeholder="入力してください">{{ $tweet->content }}</textarea>
                @error('content')
                    <p style="color:red;">{{$message}}</p>
                @enderror
                <button type="submit">編集</button>
            </form>
        </div>
    </body>