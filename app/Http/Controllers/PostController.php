<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['category', 'like', 'comment', 'user'])->where('status', 'post')->latest()->get();
        $cat = Category::all();
        return view('admin.posts', compact('posts', 'cat'));
    }

    public function news()
    {
        $news = 'news';
        $posts = Post::with('like', 'comment', 'user', 'category')->where('status', $news)->latest()->get();
        $cat = Category::all();
        return view('news', compact('posts', 'cat'));
    }

    public function popular()
    {
        $cat = Category::all();
        $posts = Post::with(['category', 'like', 'comment', 'user'])
        ->where('status', 'post')
        ->get()
        ->sortByDesc(function ($post) {
            return $post->like->count();
        });
        return view('popular', compact('posts', 'cat'));
    }

    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id'     => 'required',
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:5048',
            'title'     => 'required',
            'content'   => 'required',
            'status'    => 'required',
            'category'  => 'required',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/images', $image->hashName());

        $like = 0;

        $posts = Post::create([
            'image' => $image->hashName(),
            'user_id' => $request->input('user_id'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'likeTotal' => $like,
            'status' => $request->input('status'),
            'link' => $request->input('link'),
            'category_id' => $request->input('category'),
        ]);

        if($posts)
        {
            return back()->with(['success' => 'Post Added Successfully']);
        }
        else
        {
            return back()->with(['error' => 'Post Failed to Add']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $this->validate($request, [
            'user_id'     => 'required',
            'image'     => 'image|mimes:jpeg,jpg,png|max:5048',
            'title'     => 'required',
            'content'   => 'required',
            'status'    => 'required',
            'category'  => 'required',
        ]);

        $post = Post::findOrFail($id);

        // If a new image is uploaded, process the upload
        if ($request->hasFile('image')) {
            // Delete the old image
            Storage::delete('public/images/' . $post->image);

            // Upload the new image
            $image = $request->file('image');
            $image->storeAs('public/images', $image->hashName());

            // Update the image name in the database
            $post->image = $image->hashName();
        }

        $post->update([
            'user_id' => $request->input('user_id'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'status' => $request->input('status'),
            'link' => $request->input('link'),
            'category_id' => $request->input('category'),
        ]);

        if($post)
        {
            return back()->with(['success' => 'Post Updated Successfully']);
        }
        else
        {
            return back()->with(['error' => 'Post Failed to Update']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $post = Post::findOrFail($id);

        // Hapus semua like yang terkait
        $post->like()->delete();

        // Hapus semua komentar yang terkait
        $post->comment()->delete();

        // Hapus post itu sendiri
        $post->delete();

        return back()->with('success', 'Post Deleted Successfully');
    }
}