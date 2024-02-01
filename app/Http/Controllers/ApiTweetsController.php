<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use App\Models\Tweet;
use App\Models\User;
use App\Services\TweetService;

class ApiTweetsController extends Controller
{
    public function usersIndex()
    {
        $users = User::where('id',1)->select('id','name')->get();

        return response()->json($users);
    }
}
