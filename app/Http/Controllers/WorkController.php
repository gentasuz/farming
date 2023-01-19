<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Work;
use App\Models\Block;

class WorkController extends Controller
{
    public function index(Work $work)
    {
        return view('works/index')->with(['posts' => $work ->getByWork()]);
    }
}