<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Work;
use App\Models\Block;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'start_time',
        'end_time',
        'comment',
        'user_id',
        'work_id',
        'block_id'
        ];
        
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function work()
    {
        return $this->belongsTo(Work::class);
    }
    
    public function block()
    {
        return $this->belongsTo(Block::class);
    }
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
