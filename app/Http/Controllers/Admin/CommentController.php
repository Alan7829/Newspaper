<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

/**
 * Class CommentController
 * @package App\Http\Controllers
 */
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::paginate();

        return view('admin.comment.index', compact('comments'))
            ->with('i', (request()->input('page', 1) - 1) * $comments->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comment = new Comment();
        $news = array();
        $default_select = ['Seleccione una opción'];

        $news = News::pluck('name', 'id');
        if (!empty($news)) {
            $news = array_merge($default_select, $news->toArray());
        } else {
            $news = $default_select;
        }

        return view('admin.comment.create', compact('comment', 'news'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Comment::$rules);

        $comment = Comment::create($request->all());

        return redirect()->route('comments.index')
            ->with('success', 'Comentario creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::find($id);

        return view('admin.comment.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        $news = array();
        $default_select = ['Seleccione una opción'];

        $news = News::pluck('name', 'id');
        if (!empty($news)) {
            $news = array_merge($default_select, $news->toArray());
        } else {
            $news = $default_select;
        }

        return view('admin.comment.edit', compact('comment', 'news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        request()->validate(Comment::$rules);

        $comment->update($request->all());

        return redirect()->route('comments.index')
            ->with('success', 'Comentario editado correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $comment = Comment::find($id)->delete();

        return redirect()->route('comments.index')
            ->with('success', 'Comentario eliminado correctamente.');
    }
}
