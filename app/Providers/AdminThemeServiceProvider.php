<?php

	namespace App\Providers;

	use Illuminate\Support\ServiceProvider;

	class AdminThemeServiceProvider extends ServiceProvider
	{
		/**
		 * Bootstrap the application services.
		 *
		 * @return void
		 */
		public function boot()
		{
			$this->loadViewsFrom(__DIR__ . '/../AdminTheme/views', 'admin-lte');
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
