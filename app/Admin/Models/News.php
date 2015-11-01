<?php

	Admin::model(App\Models\News::class)->title('Новости')->display(function ()
	{
		$display = AdminDisplay::table();

		//$display->with('users', 'categories');

		$display->filters([
			Filter::related('category_id')->model(\App\Models\Category::class),
		]);

		$display->columns([
			Column::string('id')->label('Id'),
			Column::string('title')->label('Заголовок'),
			Column::string('user.username')->label('Автор')->append('author_id'),
			Column::image('image')->label('Изображение'),
			Column::string('announce')->label('Анонс'),
			Column::string('text')->label('Текст'),
			Column::string('categories.name')->label('Категория'),
		]);
		return $display;
	})->createAndEdit(function ()
	{
		$form = AdminForm::form();
		$form->items([
			FormItem::text('title')->label('Заголовок')->required(),
			FormItem::select('author_id','Автор')->model(\App\Models\User::class)->display("username")->required(),
			FormItem::image('image')->label('Изображение')->required(),
			FormItem::text('announce')->label('Анонс')->required(),
			FormItem::ckeditor('text')->label('Текст')->required(),
			FormItem::text('category')->label('Категория')->required(),
		]);
		return $form;
	});