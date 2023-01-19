<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Work;
use App\Models\Block;

class PostController extends Controller
{
    public function index(Post $post,Work $work,Block $block)
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit(),'works' => $work->get(),'blocks' => $block->get()]);
    }
    
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }
    
    public function create(Work $work,Block $block)
    {
        return view('posts/create')->with(['works' => $work->get(),'blocks' => $block->get()]);
    }
    
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post,Work $work,Block $block)
    {
        return view('posts/edit')->with(['post' => $post,'works' => $work->get(),'blocks' => $block->get()]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $input_post += ['user_id' => $request->user()->id];
        $post->update($input_post);
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
