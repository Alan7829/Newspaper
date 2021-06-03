<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'description', 'author', 'pub_date', 'pub_status', 'section', 'created_at', 'updated_at'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'news_has_categories', 'news_id','categories_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
