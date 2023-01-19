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
}