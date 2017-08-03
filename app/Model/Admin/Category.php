<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $guarded = [];

    public $timestamps = true;

    public function posts()
    {
    	return $this->belongsToMany('App\Model\Admin\Post', 'category_posts');
	}
}
