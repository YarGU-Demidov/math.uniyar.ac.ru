<?php namespace mokeev1995\BlogExtender;

use RainLab\Blog\Controllers\Posts;
use RainLab\Blog\Models\Post;
use System\Classes\PluginBase;
use Backend\Widgets\Form;
use Backend\Widgets\Lists;

class Plugin extends PluginBase
{
	public $require = ['RainLab.Blog'];

	public function registerComponents()
	{
	}

	public function registerSettings()
	{
	}

	public function boot()
	{
		Posts::extendListColumns(function (Lists $list, $model){
			if (!$model instanceof Post)
			{
				return;
			}

			$list->addColumns([
				'front_page_visible' => [
					'label' => "Отображается на главной",
					'type'  => 'switch',
				]
			]);
		});

		Posts::extendFormFields(function (Form $form, $model, $context)
		{

			if (!$model instanceof Post)
			{
				return;
			}

			$form->addSecondaryTabFields([
				'front_page_visible' => [
					'label' => "Отображать на главной странице",
					'tab'   => "rainlab.blog::lang.post.tab_manage",
					'type'  => 'checkbox',
				],
			]);
		});
	}
}
