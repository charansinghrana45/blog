<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $guarded = [];

    public $timestamps = true;

    public function categories()
    {
    	return $this->belongsToMany('App\Model\Admin\Category', 'category_posts')->withTimestamps();
	}

	public function tags()
	{
		return $this->belongsToMany('App\Model\Admin\Tag', 'post_tags')->withTimestamps();
	}

    public function getTitleAttribute($title)
    {
        return ucfirst($title);
    }
}
