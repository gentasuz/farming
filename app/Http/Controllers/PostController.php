<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Work;
use App\Models\Block;
use GuzzleHttp\Middleware;

class PostController extends Controller
{
    public function index(Post $post,Work $work,Block $block)
    {
        $posts = Post::with('blocks')->get();
        
        $client = new \GuzzleHttp\Client();
        $url = 'https://weather.tsukumijima.net/api/forecast/city/012010';
        $response = request('GET',$url);
        $response = $client->request(
        'GET',
        $url
        );

        // レスポンスボディを取得
        $responseBody = json_decode($response->getBody()->getContents(), true);

        return view('posts/index')->with(['posts' => $post->getPaginateByLimit(),'works' => $work->get(),'blocks' => $block->get(),'responseBody'=>$responseBody]);
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
        $input_blocks = $request->blocks_array; //blocks.arrayはcreate.blade.phpで指定した配列
        $post->fill($input)->save();
        $post->blocks()->attach($input_blocks);//attachメソッドで中間テーブルにデータを保存
        return redirect('/posts/' . $post->id);
        
    }
    
    public function edit(Post $post,Work $work,Block $block)
    {
        $posts = Post::with('blocks')->get();
        return view('posts/edit')->with(['post' => $post,'works' => $work->get(),'blocks' => $block->get()]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $input_post += ['user_id' => $request->user()->id];
        $input_blocks = $request->blocks_array;
        $post->fill($input_post)->save();
        $post->blocks()->attach($input_blocks);

        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        dd($post);
        $post->delete();
        return redirect('/');
    }
}
