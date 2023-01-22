<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Block extends Model
{
    use HasFactory;
    
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
    
    public function getByBlock(int $limit_count=10)
    {
        return $this->posts()->with('blocks')->orderBy('updated_at','DESC')->paginate($limit_count);
    }
}
