<?php

	Admin::model(App\Models\Category::class)->title('Категории')->display(function ()
	{
		$display = AdminDisplay::table();

		$display->columns([
			Column::string('id')->label('Id'),
			Column::string('name')->label('Название категории'),
		]);
		return $display;
	})->createAndEdit(function ()
	{
		$form = AdminForm::form();
		$form->items([
			FormItem::text('name','Название категории')->required()->unique(),
		]);
		return $form;
	});