<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Forum extends Model
{
    protected $fillable  = [
        'title',
        'description',
        'forum_category_id',
        'user_id',
        'likes',
        'comments'
    ];

    public function category()
    {
        $this->belongsTo(ForumCategory::class);
    }

    public function comments()
    {
        $this->hasMany(Comment::class);
    }
}
