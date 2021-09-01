<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getArticleComments($article_id)
    {
        $articles = News::with('comments')->where('id', $article_id)->first();
        return $articles->comments;
    }

    public function banComment($comment_id)
    {
        $comment = Comment::findOrFail($comment_id);
        $comment->is_banned = true;
        $comment->save();
        return [
            'message' => 'Comentario baneado'
        ];
    }

    public function unbanComment($comment_id)
    {
        $comment = Comment::findOrFail($comment_id);
        $comment->is_banned = false;
        $comment->save();
        return [
            'message' => 'Comentario desbaneado'
        ];
    }
}
