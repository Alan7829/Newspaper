<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsHasCategories extends Model
{
    use HasFactory;
    protected $fillable = ['news_id', 'categories_id', 'created_at', 'updated_at'];
    public function news_categories()
    {
        return $this->hasManyThrough(News::class, Category::class);
    }
}
