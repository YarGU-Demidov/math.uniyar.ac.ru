<?php

	Admin::model(App\Models\Degree::class)->title('Усправление научными степенями')->display(function ()
	{
		$display = AdminDisplay::table();

		$display->apply(function ($query)
		{
			$query->orderBy('order', 'asc');
		});

		$display->columns([
			Column::string('id')->label('Id'),
			Column::string('name')->label('Научная степень'),
			Column::order(),
		]);
		return $display;
	})->createAndEdit(function ()
	{
		$form = AdminForm::form();
		$form->items([
			FormItem::text('name','Научная степень')->required()->unique(),
		]);
		return $form;
	});