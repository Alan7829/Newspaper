<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\News;
use App\Models\Category;

use Illuminate\Http\Request;

/**
 * Class NewsController
 * @package App\Http\Controllers
 */
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = News::paginate();

        return view('admin.news.index', compact('articles'))
            ->with('i', (request()->input('page', 1) - 1) * $articles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $news = new News();
        $categories = array();
        $default_select = ['Seleccione una opción'];

        $news_category = Category::where('name', 'News')->first();
        if (!empty($news_category)) {
            $categories = Category::where('parent_id', $news_category->id)->pluck('name', 'id');
            $categories = array_merge($default_select, $categories->toArray());
        } else {
            $categories = $default_select;
        }

        return view('admin.news.create', compact('news', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(News::$rules);

        $news = News::create($request->all());

        return redirect()->route('news.index')
            ->with('success', 'Noticia creada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);

        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        $categories = array();

        $news_category = Category::where('name', 'News')->first();

        if (!empty($news_category)) {
            $categories = Category::where('parent_id', $news_category->id)->pluck('name', 'id');
            $categories[0] = 'Seleccione una opción';
        } else {
            $categories[0] = 'Seleccione una opción';
        }

        /* dd($categories); */
        return view('admin.news.edit', compact('news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        request()->validate(News::$rules);

        $news->update($request->all());

        return redirect()->route('news.index')
            ->with('success', 'Noticia editada correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $news = News::find($id)->delete();

        return redirect()->route('news.index')
            ->with('success', 'Noticia eliminada correctamente.');
    }
}
