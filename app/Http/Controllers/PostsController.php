<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([
            'index', 'show'
        ]);
    }

    public function index()
    {
        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();



        $archives = Post::selectRaw('YEAR(created_at) year,MONTHNAME(created_at) month,count(*) published')
            ->groupBy('YEAR', 'MONTH')
            ->orderByRaw('min(created_at)', 'desc')
            ->get();

        return view('posts.index', compact('posts', 'archives'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'body' => 'required|min:3',
        ]);

        $post = request(['title', 'body']);
        \Auth::user()->publish(new Post($post));

        return redirect()->home();
    }
}
