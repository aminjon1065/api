<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class UsersArticlesController extends Controller
{
    public function UsersArticlesCount()
    {
        $usersArticles = User::withCount('article')->get();
        return response()->json($usersArticles);
    }

    public function UserPosts()
    {
        $userId = auth()->id();
        $posts = Article::with('category', 'user')->where('userId', $userId)->paginate(5);

//        $usersPosts = Article::with('category, user')->where('userId', $userId)->paginate(5);
        return response()->json($posts);
    }
}
