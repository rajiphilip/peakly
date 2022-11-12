<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Forum extends Model
{
    use HasFactory;

    protected $fillable  = [
        'title',
        'body',
        'slug',
        'forum_category_id',
        'user_id',
        'image'
    ];

    public function forum_category()
    {
       return $this->belongsTo(ForumCategory::class);
    }

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function comments()
    {
       return $this->hasMany(Comment::class);
    }

    // public function posts()
    // {
    //    return $this->hasMany(Comment::class);
    // }

}
