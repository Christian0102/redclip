<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    public $timestamps = true;
    
    protected $fillable = ['title', 'text'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
