<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function userOnlineStatus()
    {
        $users = DB::table('users')->get();

        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id))
                echo $user->name;
            else
                echo $user->name;
        }
        return response()->json($user);
    }
}
