<?php

return [
	/*
	 * Admin title
	 * Displays in page title and header
	 */

	/*
	 * Admin url prefix
	 */
	'prefix'                  => 'manager',

	/*
	 * Middleware to use in admin routes
	 */
	'middleware'              => ['admin.auth'],

	/*
	 * Path to admin bootstrap files directory
	 * Default: app_path('Admin')
	 */
	'bootstrapDirectory'      => app_path('Admin'),

	/*
	 * Directory to upload images to (relative to public directory)
	 */
	'imagesUploadDirectory' => 'images/uploads',

	/*
	 * Authentication config
	 */
	'auth'                    => [
		'model' => \App\Models\User::class, //\SleepingOwl\AdminAuth\Entities\Administrator::class,
		'rules' => [
			'username' => 'required',
			'password' => 'required',
		]
	],

	/*
	 * Template to use
	 */
	'template'                => App\AdminTheme\AdminTemplate::class, //SleepingOwl\Admin\Templates\TemplateDefault::class,

	/*
	 * Default date and time formats
	 */
	'datetimeFormat'          => 'd.m.Y H:i',
	'dateFormat'              => 'd.m.Y',
	'timeFormat'              => 'H:i',

	/*
	 * If you want, you can extend ckeditor default configuration
	 * with this PHP Hash variable.
	 *
	 * Checkout http://docs.ckeditor.com/#!/api/CKEDITOR.config for more information.
	 */
	'ckeditor' => [],

	//admin version
	'version' => "0.1.0a",
];
