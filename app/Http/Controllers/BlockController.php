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
        return view('blocks/index')->with(['posts' => $block ->getByBlock(), 'block'=> $block]);
    }
    
    public function searchIndex(Block $block,Post $post, Request $request)
    {
        $query = $request->query()['block'];
        $blocks = $block->get();
        
        foreach($blocks as $block)
        {
            // if($block["NE"] == NULL){
            //     $block["NE"] = "test";
            // }
            
            if(str_contains($block->name,"NE")){
                $query_res = $block->posts()->where("start_time", ">=", $query['fromDate'])->first();
                $config = $block["NE"];
                if(!empty($query_res))
                {
                    $config[$block->id] = array("name" => $block->name ,"block_id" => $block->id , "search_fig" => true);
                }
                else
                {
                   $config[$block->id] = array("name" => $block->name ,"block_id" => $block->id , "search_fig" => false);
                }
                
                $block["NE"] = $config;
            }
            elseif(str_contains($block->name,"SE")){
                $query_res = $block->posts()->where("start_time", ">=", $query['fromDate'])->first();
                $config = $block["SE"];
                if(!empty($query_res))
                {
                    $config[$block->id] = array("name" => $block->name ,"block_id" => $block->id , "search_fig" => true);
                }
                else
                {
                   $config[$block->id] = array("name" => $block->name ,"block_id" => $block->id , "search_fig" => false);
                }
                
                $block["SE"] = $config;
            }
            elseif(str_contains($block->name,"NW")){
                $query_res = $block->posts()->where("start_time", ">=", $query['fromDate'])->first();
                $config = $block["NW"];
                if(!empty($query_res))
                {
                    $config[$block->id] = array("name" => $block->name ,"block_id" => $block->id , "search_fig" => true);
                }
                else
                {
                   $config[$block->id] = array("name" => $block->name ,"block_id" => $block->id , "search_fig" => false);
                }
                
                $block["NW"] = $config;
            }
            elseif(str_contains($block->name,"SW")){
                $query_res = $block->posts()->where("start_time", ">=", $query['fromDate'])->first();
                $config = $block["SW"];
                if(!empty($query_res))
                {
                    $config[$block->id] = array("name" => $block->name ,"block_id" => $block->id , "search_fig" => true);
                }
                else
                {
                   $config[$block->id] = array("name" => $block->name ,"block_id" => $block->id , "search_fig" => false);
                }
                
                $block["SW"] = $config;
            }
            
            
            /*elseif(strpos($block->name,'SE' !== true ){
                $block_filter_se[] = array("name"=>"$block->name","block_id"=> "$block->id", "search_fig" => "false");
                foreach($block->posts as $post)
                {
                    if($post->start_time > $query['fromDate'])
                    {
                        array_pop($block_filter);
                        $block_filter_se[] = array("name"=>"$block->name", "block_id"=> "$block->id", "search_fig" => "true");
                    }
                }
            }
            elseif(strpos($block->name,'NW' !== true ){
                $block_filter_nw[] = array("name"=>"$block->name","block_id"=> "$block->id", "search_fig" => "false");
                foreach($block->posts as $post)
                {
                    if($post->start_time > $query['fromDate'])
                    {
                        array_pop($block_filter);
                        $block_filter_nw[] = array("name"=>"$block->name", "block_id"=> "$block->id", "search_fig" => "true");
                    }
                }
            }
            elseif(strpos($block->name,'SW' !== true ){
                $block_filter_sw[] = array("name"=>"$block->name","block_id"=> "$block->id", "search_fig" => "false");
                foreach($block->posts as $post)
                {
                    if($post->start_time > $query['fromDate'])
                    {
                        array_pop($block_filter);
                        $block_filter_sw[] = array("name"=>"$block->name", "block_id"=> "$block->id", "search_fig" => "true");
                    }
                }
            }*/
        }
        return view('blocks/searchIndex')->with([ 'posts' => $post->get() ,'blocks' => $blocks]);
    }
}