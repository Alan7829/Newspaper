<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class News
 *
 * @property $id
 * @property $name
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
    protected $fillable = ['name','description','author','pub_date','pub_status','section'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'news_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function newsHasCategories()
    {
        return $this->hasMany('App\Models\NewsHasCategory', 'news_id', 'id');
    }
    

}
