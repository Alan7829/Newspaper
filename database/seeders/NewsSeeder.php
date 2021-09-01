<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create news
        /* Crea un ciclo for y crea 10 news de una sola barrida */

        for ($i = 0; $i < 10; $i++) {
            News::create([
                'name' => 'Noticia de prueba en seed',
                'category_id' => 1,
                'description' => 'Noticia de prueba',
                'author' => 'Alan Moreno Martinez',
                'pub_date' => '2021-08-30',
                'pub_status' => '0',
                'section' => 'Prueba'
            ]);
        }
    }
}
