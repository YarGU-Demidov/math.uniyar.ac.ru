<?php
	/**
	 * Created by PhpStorm.
	 * User: mokeev1995
	 * Date: 31.10.2015
	 * Time: 16:11
	 */
	
	namespace App\Http\ViewComposers;

	use Illuminate\Contracts\View\View;
	
	class MenuComposer
	{
		protected $menuItems = [];

		/**
		 * Create a new menu composer.
		 */
		public function __construct()
		{
			$this->menuItems = [

			];
		}

		/**
		 * Bind data to the view.
		 *
		 * @param  View  $view
		 * @return void
		 */
		public function compose(View $view)
		{
			$view->with('menu', ["test"]);
		}
	}