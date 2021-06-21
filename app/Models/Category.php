<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 *
 * @property $id
 * @property $name
 * @property $parent_id
 * @property $created_at
 * @property $updated_at
 *
 * @property NewsHasCategory[] $newsHasCategories
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Category extends Model
{

    static $rules = [
		'name' => 'required',
		'parent_id' => 'numeric',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','parent_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany(News::class, 'news_id');
    }

    public function child_categories(){
      return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent_category(){
      return $this->belongsTo(Category::class, 'parent_id');
    }
}
