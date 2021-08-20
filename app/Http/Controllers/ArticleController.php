<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{


    public function index()
    {
        $posts = Article::paginate(10);
        return response()->json($posts);
    }

//    public function __construct()
//    {
//        $this->middleware('auth:api', ['except' => ['login']]);
//    }

    public function store(Request $request)
    {
        $artcile = Article::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'img' => 'https://via.placeholder.com/640x480.png/00ccbb?text=labore',
            'userId' => $request->user()->id,
            'categoryId' => $request->input('categoryId')
        ]);
        return response()->json($artcile);
    }
}
