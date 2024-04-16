<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontPostsController extends Controller {

	public function __invoke( string $slug ) {

		$post = Post::where( 'slug', '=', $slug )->first();

		// dd( $post );
		// $rendered = $post->render( 'post_content' );

		return view( 'frontend.posts.index', compact( 'post' ) );
	}
}
