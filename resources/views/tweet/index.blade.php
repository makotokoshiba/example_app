@extends('layouts.app')

@section('content')

    
        <h1>tweets</h1>
        <div>
            <p>投稿フォーム</p>
            @if(session('tweet.delete.success'))
                <p style="color:green">{{ session('tweet.delete.success') }}</p>
            @endif
            <form action="{{route('tweet.create')}}" method="post">
                @csrf
                
                <label for="tweet_content"> つぶやき</label>
                <span>20文字まで</span>
                <textarea id="tweet-content" type="text" name="content" placeholder="入力してください"></textarea>
                <button type="submit" class="btn btn-primary btn-sm">投稿</button>
                
            </form>
        </div>
        <div>
            @foreach($tweets as $tweet)
            <details>
                <summary>{{$tweet->content}} by {{$tweet->user->name}}</summary>
                @if($tweet->user_id == Auth::user()->id)
                    <div>
                        <a href="{{ route('tweet.edit',['tweetId'=>$tweet->id]) }}" class="btn btn-info btn-sm">編集</a>
                    
                        <form action="{{ route('tweet.destroy',['tweetId'=>$tweet->id]) }}" method="post">
                            @method('DELETE') 
                            @csrf
                            <button type="submit" class="btn btn-error btn-sm">削除</button>   
                        </form>
                    </div>
                @else
                    <div>編集できません</div>
                @endif
            </details>
            @endforeach
        </div>
        
    

@endsection