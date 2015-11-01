<?php
	/**
	 * Created by PhpStorm.
	 * User: mokeev1995
	 * Date: 31.10.2015
	 * Time: 16:11
	 */

	namespace App\Http\ViewComposers;

	use App\HTMLItems\A;
	use Illuminate\Contracts\View\View;

	class MenuComposer
	{
		protected $menuItems = [];

		/**
		 * Create a new menu composer.
		 */
		public function __construct()
		{
			//TODO: Get items from database!
			$this->menuItems = [
				new A("#", null, "Абитуриентам"),
				new A("#", null, "Студентам"),
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
			$view->with('menu', $this->menuItems);
		}
	}