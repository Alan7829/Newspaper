<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $categories = Category::with(['child_categories'])->where('name', 'News')->first()->child_categories;
        $articles = News::where('pub_status', 1)->orderBy('id', 'DESC')->take(6)->get();

        return view('site.index', compact('categories', 'articles'));
    }
}
