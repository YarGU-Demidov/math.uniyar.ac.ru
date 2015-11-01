<?php

	Admin::model(App\Models\Keyword::class)->title('Ключевые слова')->display(function ()
	{
		$display = AdminDisplay::table();
		$display->columns([
			Column::string('id')->label('Id'),
			Column::string('word')->label('Ключевое слово'),

		]);
		return $display;
	})->createAndEdit(function ()
	{
		$form = AdminForm::form();
		$form->items([
			FormItem::text('word')->label('Ключевое слово')->required(),
		]);
		return $form;
	});