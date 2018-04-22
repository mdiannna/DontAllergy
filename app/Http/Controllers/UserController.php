<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class UserController extends Controller
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
     * show user allergies
     *
     * @return view
     */
    public function allergies()
    {
        $allergies = auth()->user()->allergies;
        return view('user_allergies', compact('allergies'));
    }

    /**
     * Update User info
     *
     */
    public function update(Request $request)
    {
        auth()->user()->update($request->toArray());
        return redirect()->back();
    }

    /**
     * See user profile
     *
     */
    public function view()
    {
        return view('user.profile');
    }

    /**
     * Get user
     *
     */
    public function get()
    {
        $user = auth()->user();
        return response()->json(auth()->user()->toArray() + ['success' => true]);
    }

    /**
     * Save a post
     *
     */
    public function savePost(PostRequest $request, Post $post)
    {
        $post = $post->create($request->all() + ['user_id' => auth()->user()->id]);
        return redirect()->back();
    }

    /**
     * Delete a post
     *
     */
    public function deletePost(Post $post, Request $request)
    {
        $post = $post->findOrFail($request->id);
        if ($post->user->id == auth()->user()->id) {
            $post->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['succes' => false]);
    }
}
