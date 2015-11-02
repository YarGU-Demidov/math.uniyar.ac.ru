<?php

	Admin::model(App\Models\News::class)->title('Новости')->display(function ()
	{
		$display = AdminDisplay::table();

		$display->columns([
			Column::string('id')->label('Id'),
			Column::string('title')->label('Заголовок'),
			Column::string('user.username')->label('Автор'),
			Column::image('image')->label('Изображение'),
			Column::string('announce')->label('Анонс'),
			Column::string('categories.name')->label('Категория'),
		]);
		return $display;
	})->createAndEdit(function ()
	{
		$form = AdminForm::form();
		$form->items([
			FormItem::columns()->columns([
				[
					FormItem::text('title')->label('Заголовок')->required(),
					FormItem::select('author_id','Автор')->model(\App\Models\User::class)->display("username")->required(),
					FormItem::select('category_id','Категория')->model(\App\Models\Category::class)->display('name')->required(),
					FormItem::image('image')->label('Изображение')->required(),
				],
				[
					FormItem::ckeditor('announce')->label('Анонс')->required(),
					FormItem::ckeditor('text')->label('Текст')->required(),
				],
			]),
		]);
		return $form;
	});