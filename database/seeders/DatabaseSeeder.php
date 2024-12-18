<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'toti@gmail.com',
            'password' => '$2y$12$nJT5MdPhGzDqNZFfbjxCL.gROd37N0Y/f6mSx7dxV67Uju5Jtza/S',
            'is_admin' => 1,
        ]);
        User::factory()->count(10)->create();

        Article::factory()->count(10)->create();
        Comment::factory()->count(20)->create();

        Category::factory()->count(5)->create();

        foreach (Article::all() as $article) {
            $list_of_categories = Category::inRandomOrder()->take(random_int(0, 4))->get();
            $article->categories()->attach($list_of_categories);
        }

        // Category with no articles
        Category::factory(1)->create();
    }
}
