<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //Get all Articles with conditions by category and pub_status == 1 (Publicado)
    public function getArticlesByCategory($category_id)
    {
        return News::where('category_id', $category_id)->where('pub_status', 1)->orderBy('id', 'DESC')->take(6)->get();
        // return News::where('category_id', $category_id)->get();
    }
}
