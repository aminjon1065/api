<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{


    public function index()
    {
        $posts = Article::with('category', 'user')->paginate(5);
        return response()->json($posts);
    }

//    public function __construct()
//    {
//        $this->middleware('auth:api', ['except' => ['login']]);
//    }

    public function show($id)
    {
        $posts = Article::with('category', 'user')->where('id', $id)->first();
        return response()->json($posts);
    }

    public function searchPost(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');
        $post = '';
        if ($request->input('search') || $request->input('category')) {
            return $post = Article::with('category', 'user')
                ->where('categoryId', "LIKE", "%$category%")
                ->where('title', 'LIKE', "%$search%")
                ->orderBy('created_at', 'DESC')
                ->get();
        }
        return response()->json($post);


    }

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
