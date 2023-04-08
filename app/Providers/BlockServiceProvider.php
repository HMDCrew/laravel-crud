<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use VanOns\Laraberg;

class BlockServiceProvider extends ServiceProvider {

	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot() {
		Laraberg::registerBlockType(
			'my-namespace/my-block',
			array(),
			function ( $attributes, $content ) {
				return view( 'blocks.my-block', compact( 'attributes', 'content' ) );
			}
		);
	}
}
