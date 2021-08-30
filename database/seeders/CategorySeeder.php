<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create categories
        Category::create(['name'=>'News','parent_id'=>'0']);
        Category::create(['name'=>'Local','parent_id'=>'1']);
        Category::create(['name'=>'Nacional','parent_id'=>'1']);
        Category::create(['name'=>'Internacional','parent_id'=>'1']);
        Category::create(['name'=>'Comments','parent_id'=>'0']);
        Category::create(['name'=>'Spam','parent_id'=>'5']);
        Category::create(['name'=>'Contenido inadecuado','parent_id'=>'5']);
    }
}
