<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 *
 * @property $id
 * @property $author
 * @property $email
 * @property $message
 * @property $news_id
 * @property $created_at
 * @property $updated_at
 *
 * @property News $news
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Comment extends Model
{

    static $rules = [
		'author' => 'required',
		'email' => 'required',
		'message' => 'required',
		'news_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['author','email','message','news_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function article()
    {
        return $this->belongsTo(News::class, 'news_id');
    }
}
