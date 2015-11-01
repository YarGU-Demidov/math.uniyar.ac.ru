<?php

	namespace App\Providers;

	use App\Http\ViewComposers\MenuComposer;
	use Illuminate\Support\ServiceProvider;
	use Illuminate\Contracts\View\View;

	class ComposerServiceProvider extends ServiceProvider
	{
		/**
		 * Bootstrap the application services.
		 *
		 * @return void
		 */
		public function boot()
		{
			view()->composer(
				'partials.topMenu', MenuComposer::class
			);
		}

		/**
		 * Register the application services.
		 *
		 * @return void
		 */
		public function register()
		{
			//
		}
	}
