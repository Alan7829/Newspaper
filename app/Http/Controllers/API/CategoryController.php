<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //Get all child categories of category News
    public function getCategories(){
        $categories = Category::with(['child_categories'])->where('name', 'News')->first();
        return $categories->child_categories;
    }

}
