<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class News
 *
 * @property $id
 * @property $name
 * @property $category_id
 * @property $description
 * @property $author
 * @property $pub_date
 * @property $pub_status
 * @property $section
 * @property $created_at
 * @property $updated_at
 *
 * @property Comment[] $comments
 * @property NewsHasCategory[] $newsHasCategories
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class News extends Model
{

    static $rules = [
        'name' => 'required',
        'category_id' => 'required',
        'description' => 'required',
        'author' => 'required',
        'pub_date' => 'required',
        'pub_status' => 'required',
        'section' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'category_id', 'description', 'author', 'pub_date', 'pub_status', 'section'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        //return $this->hasMany(Comment::class, 'comment_id'); // aqui está mal tu relacion
        return $this->hasMany(Comment::class, 'news_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
