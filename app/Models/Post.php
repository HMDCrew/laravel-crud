<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use VanOns\Laraberg\Traits\RendersContent;

class Post extends Model {

	use HasFactory;
	use RendersContent;

	protected $fillable = array(
		'id',
		'title',
		'slug',
		'post_content',
		'created_at',
		'updated_at',
	);

	protected $contentColumn = 'post_content';
}
