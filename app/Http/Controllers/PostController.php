<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    
    public function index()
    {
        $posts = Post::paginate(5);
        return view('welcome', compact('posts'));
    }

    
    public function create()
    {
        return view('create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:posts,id',
            'name' => 'required',
            'skill' => 'required',
            'location' => 'required',
            'contact_info' => 'required',
        ]);

        $post = new Post();
        $post->id = $request->id;
        $post->name = $request->name;
        $post->skill = $request->skill;
        $post->location = $request->location;
        $post->contact_info = $request->contact_info;
        $post->save();

        return redirect()->route('home')->with('success', 'Post created successfully!');
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('edit', compact('post'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required|unique:posts,id,' . $id,
            'name' => 'required',
            'skill' => 'required',
            'location' => 'required',
            'contact_info' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->id = $request->id;
        $post->name = $request->name;
        $post->skill = $request->skill;
        $post->location = $request->location;
        $post->contact_info = $request->contact_info;
        $post->save();

        return redirect()->route('home')->with('success', 'Post updated successfully!');
    }


    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('home')->with('success', 'Post deleted successfully!');
    }
}
