<?php

	Admin::model(App\Models\Degree::class)->title('Manage Degrees')->display(function ()
	{
		$display = AdminDisplay::table();
		$display->columns([
			Column::string('id')->label('Id'),
			Column::string('name_string_id')->label('Name'),
		]);
		return $display;
	})->createAndEdit(function ()
	{
		$form = AdminForm::form();
		$form->items([
			FormItem::text('name_string_id','Name')->required()->unique(),
		]);
		return $form;
	});