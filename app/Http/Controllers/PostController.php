<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Validator;

class PostController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('status', 'Something wrong!');
        }else{
            Post::create([
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'description' => $request->description
            ]);

            return redirect(route('posts.all'))->with('status', 'Post created successfully!');
        }
    }

    public function show($post_id){
        $post = Post::findOrFail($post_id);
        return view('posts.show', compact('post'));
    }

    public function edit($post_id){
        $post = Post::findOrFail($post_id);
        return view('posts.edit', compact('post'));
    }

    public function update($post_id, Request $request){
        // dd($request->all());
        Post::findOrFail($post_id)->update($request->all());
        return redirect(route('posts.all'))->with('status', 'Post updated!');
    }

    public function delete($post_id){
        Post::findOrFail($post_id)->delete();
        return redirect(route('posts.all'))->with('status', 'Post deleted!');
    }
}
