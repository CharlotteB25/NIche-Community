<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\BookGenre;
use App\Models\BookUser;
use App\Models\Genre;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Book::factory(100)->create();
        Genre::factory(10)->create();
        Post::factory(100)->create();
        User::factory(10)->create();
        Comment::factory(100)->create();
        BookGenre::factory(100)->create();
        BookUser::factory(100)->create();
    }
}
