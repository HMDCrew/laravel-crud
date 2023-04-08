<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StorePostRequest;

class PostsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		abort_if( Gate::denies( 'user_access' ), Response::HTTP_FORBIDDEN, '403 Forbidden' );

		$posts = Post::all();

		return view( 'backend.posts.index', compact( 'posts' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		abort_if( Gate::denies( 'user_access' ), Response::HTTP_FORBIDDEN, '403 Forbidden' );

		return view( 'backend.posts.create' );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  App\Http\Requests\StorePostRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store( StorePostRequest $request ) {
		abort_if( Gate::denies( 'user_access' ), Response::HTTP_FORBIDDEN, '403 Forbidden' );

		$new_post = $request->validated();
		$post     = Post::create( $new_post );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show( Post $post ) {
		return $this->edit( $post );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit( Post $post ) {
		abort_if( Gate::denies( 'user_access' ), Response::HTTP_FORBIDDEN, '403 Forbidden' );

		return view( 'backend.posts.edit', compact( 'post' ) );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $id ) {
        abort_if( Gate::denies( 'user_access' ), Response::HTTP_FORBIDDEN, '403 Forbidden' );

		$post = Post::find( $id );
		$post->update(
            array(
                'title' => $request->input( 'title' ),
                'slug' => $request->input( 'slug' ),
                'post_content' => $request->input( 'post_content' ),
            )
        );

		return redirect()->route( 'posts.index' );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( Post $post ) {
		abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $post->delete();

        return redirect()->route('posts.index');
	}
}
