<?php

	/*
	 * This is a simple example of the main features.
	 * For full list see documentation.
	 */

	Admin::model(App\Models\User::class)->title('Управление пользователями')->display(function ()
	{
		$display = AdminDisplay::table();
		$display->columns([
			Column::string('id')->label('Id'),
			Column::string('surname')->label('Фамилия'),
			Column::string('name')->label('Имя'),
			Column::string('middlename')->label('Отчество'),
			Column::string('username')->label('Логин'),
			Column::string('email')->label('Email'),
		]);
		return $display;
	})->create(function ()
	{
		$form = AdminForm::form();
		$form->items([
			FormItem::text('surname','Фамилия')->required(),
			FormItem::text('name','Имя')->required(),
			FormItem::text('middlename','Отчество')->required(),
			FormItem::text('username', 'Логин')->required()->unique(),
			FormItem::text('email', 'Email')->required()->unique(),
			FormItem::password('password', 'Пароль')->required(),
		]);
		return $form;
	})->edit(function(){
		$form = AdminForm::form();
		$form->items([
			FormItem::text('surname','Фамилия')->required(),
			FormItem::text('name','Имя')->required(),
			FormItem::text('middlename','Отчество')->required(),
			FormItem::text('email', 'Email')->required()->unique(),
			FormItem::password('password', 'Пароль')->required(),
		]);
		return $form;
	});