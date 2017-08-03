<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

	protected $table = 'tags';

    protected $guarded = [];

    public $timestamps = true;

    public function posts()
	{
		return $this->belongsToMany('App\Model\Admin\Post', 'post_tags');
	}
}
