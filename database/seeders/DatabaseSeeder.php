<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Forum;
use App\Models\Comment;
use App\Models\Document;
use App\Models\Property;
use App\Models\CommentLike;
use App\Models\CommentShare;
use App\Models\ForumCategory;
use App\Models\PropertyImage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();
        ForumCategory::factory(5)->create();
        Forum::factory(20)->create();
        Comment::factory(20)->create();
        CommentLike::factory(50)->create();
        CommentShare::factory(50)->create();
        Property::factory(15)->create();
        PropertyImage::factory(75)->create();
        Document::factory(75)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
