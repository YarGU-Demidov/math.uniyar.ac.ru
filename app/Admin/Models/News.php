<?php

	Admin::model(App\Models\News::class)->title('Новости')->display(function ()
	{
		$display = AdminDisplay::table();

		$display->columns([
			Column::image('image')->label('Изображение'),
			Column::string('author.username')->label('Автор'),
			Column::string('category.name')->label('Категория'),
			Column::string('title')->label('Заголовок'),
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
					FormItem::multiselect('keywords', 'Ключевые слова')->model(\App\Models\Keyword::class)->display('word'),
					FormItem::image('image')->label('Изображение'),
				],
				[
					FormItem::ckeditor('announce')->label('Анонс')->required(),
					FormItem::ckeditor('text')->label('Текст')->required(),
				],
			]),
		]);
		return $form;
	});