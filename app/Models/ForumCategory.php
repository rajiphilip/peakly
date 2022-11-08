<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumCategory extends Model
{
    use HasFactory;

    protected $fillable  = [
        'user_id',
        'name'
    ];

    public function forums()
    {
        $this->hasMany(Forum::class);
    }
}
