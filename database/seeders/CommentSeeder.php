<?php

namespace Database\Seeders;

use App\Models\Comment;


use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create comments
        for ($i = 0; $i < 100; $i++) {
            Comment::create([
                'author' => 'Alan Martinez',
                'email' => 'alanalexis@gmail.com',
                'message' => 'Esta noticia es de prueba',
                'is_banned' => 0,
                'news_id' => rand(1, 10),
            ]);
        }
    }
}
