<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Work;
use App\Models\Block;

class BlockController extends Controller
{
    public function index(Block $block)
    {
        return view('blocks/index')->with(['posts' => $block ->getByBlock()]);
    }
    
    public function searchIndex(Block $block,Post $post, Request $request)
    {
        $query = $request->query()['block'];
        
        $block_filter = [];
        $blocks = $block->get();
        
        foreach($blocks as $block)
        {
            $block_filter[] = array("name"=>"$block->name","block_id"=> "$block->id", "search_fig" => "false");
            foreach($block->posts as $post)
            {
                if($post->start_time > $query['fromDate'])
                {
                    array_pop($block_filter);
                    $block_filter[] = array("name"=>"$block->name", "block_id"=> "$block->id", "search_fig" => "true");
                }
            }
        }
        return view('blocks/searchIndex')->with([ 'posts' => $post->get() ,'block_filter' => $block_filter]);
    }
}