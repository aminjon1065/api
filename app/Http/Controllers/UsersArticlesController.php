<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersArticlesController extends Controller
{
    public function UsersArticlesCount()
    {
        $usersArticles = User::withCount('article')->get();
        return response()->json($usersArticles);
    }
}
