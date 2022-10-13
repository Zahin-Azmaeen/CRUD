<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function addpost()
    {
        return view('add-post');
    }
    public function createPost(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return back()->with('post_created', 'Post has benn created successfully!');
    }

    public function getPost()
    {
        $posts = Post::orderBy('id', 'ASC')->get();
        return view('posts', compact('posts'));
    }
    public function getPostById($id)
    {
        $posts = Post::where('id', $id)->first();
        return view('single-post', compact('posts'));
    }
    public function editPost($id)
    {
        $posts = Post::find($id);
        return view('edit-post', compact('posts'));
    }
    public function deletePost($id)
    {
        $posts = Post::where('id', $id)->delete();
        return back()->with('post_deleted', 'Post has been deleted successfully');
    }
    public function updatePost(Request $request)
    {
        $post = Post::find($request->id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return back()->with('post_updated', 'Post has benn updated successfully!');
    }

    public function getPostQuery()
    {
        $posts = DB::select('SELECT * from posts');
        //dd($posts);
        return view('postsquery', compact('posts'));
    }
}
