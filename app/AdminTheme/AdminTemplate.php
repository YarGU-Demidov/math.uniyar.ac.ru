<?php
	
	namespace App\AdminTheme;

	use SleepingOwl\Admin\AssetManager\AssetManager;
	use SleepingOwl\Admin\Interfaces\TemplateInterface;
	
	class AdminTemplate implements TemplateInterface
	{
		public function __construct()
		{
			AssetManager::addStyle(asset('//fonts.googleapis.com/css?family=Roboto:400,300,100,500,700&subset=latin,cyrillic'));
			AssetManager::addStyle(asset('packages/admin-lte/fa/css/font-awesome.min.css'));
			AssetManager::addStyle(asset('packages/admin-lte/bootstrap/css/bootstrap.min.css'));
			AssetManager::addStyle(asset('packages/admin-lte/css/AdminLTE.min.css'));
			AssetManager::addStyle(asset('packages/admin-lte/css/skins/_all-skins.min.css'));
			AssetManager::addStyle(asset('packages/admin-lte/css/custom.css'));
			AssetManager::addStyle(asset('packages/admin-lte/css/dataTables.bootstrap.css'));
			AssetManager::addStyle(asset('packages/admin-lte/plugins/iCheck/all.css'));

			AssetManager::addScript(route('admin.lang'));
			AssetManager::addScript(asset('packages/admin-lte/js/jquery-2.1.4.min.js'));
			AssetManager::addScript(asset('packages/admin-lte/bootstrap/js/bootstrap.min.js'));
			AssetManager::addScript(asset('packages/admin-lte/js/fastclick.js'));

			AssetManager::addScript(asset('packages/admin-lte/js/admin.js'));
			AssetManager::addScript(asset('packages/admin-lte/js/app.js'));

			AssetManager::addScript(asset('packages/admin-lte/js/jquery.sparkline.min.js'));
			AssetManager::addScript(asset('packages/admin-lte/js/jquery.slimscroll.min.js'));
			AssetManager::addScript(asset('packages/admin-lte/js/Chart.min.js'));
			AssetManager::addScript(asset('packages/admin-lte/plugins/iCheck/icheck.min.js'));
		}
		
		/**
		 * Get full view name
		 * @param string $view
		 * @return string
		 */
		public function view($view)
		{
			$currentView = 'admin-lte::' . $view;
			if (\View::exists($currentView))
			{
				return $currentView;
			}

			return 'admin::default.' . $view;
		}
	}