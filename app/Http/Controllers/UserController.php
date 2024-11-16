<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        $posts = Post::with('like', 'comment', 'user', 'category')->where('user_id', $userId)->where('status', 'post')->latest()->get();
        $cat = Category::all();
        return view('profile', compact('posts', 'cat'));
    }


    public function users()
    {
        $users = User::with('group')->get();
        $cat = Category::all();
        return view('admin.users', compact('users', 'cat'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $group = User::findOrFail($id);

        $group->update([
            'name' => $request->name,
        ]);

        return back()->with('success', 'Update berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}