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
		'parent_id' => 'required',
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
    public function newsHasCategories()
    {
        return $this->hasMany('App\Models\NewsHasCategory', 'categories_id', 'id');
    }
    

}
