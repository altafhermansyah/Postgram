<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Group;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cat = Category::all();
        $groups = Group::all();
        $users = User::all();
        $posts = Post::with(['category', 'like', 'comment', 'user'])->where('status', 'post')->latest()->get();
        return view('home', compact('cat', 'posts', 'groups', 'users'));
    }
}