<?php

namespace App\Http\Controllers;

use App\Models\Online;
use Illuminate\Http\Request;

class OnlineController extends Controller
{
    public function isOnline(Request $request)
    {
        $user = response(auth()->user());
        $isOnlined = Online::create([
            'userId' => $user->original->id
        ]);

        return response()->json($isOnlined);
    }

    public function offline()
    {
        $user = response(auth()->user());
        $isOfflined = Online::where('userId', '=', $user->original->id)->delete();
        return response()->json('Offline');

    }

    public function onlineUsers()
    {
        $users = Online::with('user')->get();
        return response()->json($users);
    }
}
