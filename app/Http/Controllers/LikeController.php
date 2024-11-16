<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $postId = $request->post_id;
        $userId = auth()->id();

        // Periksa apakah user sudah like post ini
        $existingLike = Like::where('user_id', $userId)->where('post_id', $postId)->first();

        if ($existingLike) {
            // Jika sudah like, hapus like dan kurangi likeTotal
            $existingLike->delete();

            Post::where('id', $postId)->decrement('likeTotal');
        } else {
            // Jika belum like, tambahkan like dan tingkatkan likeTotal
            Like::create([
                'user_id' => $userId,
                'post_id' => $postId,
                'liked_at' => now(),
            ]);

            Post::where('id', $postId)->increment('likeTotal');
        }

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Like $like)
    {
        //
    }
}