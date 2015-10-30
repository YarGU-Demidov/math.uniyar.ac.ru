<?php

	/*
	 * This is a simple example of the main features.
	 * For full list see documentation.
	 */

	Admin::model(App\Models\User::class)->title('Manage Users')->display(function ()
	{
		$display = AdminDisplay::table();
		$display->columns([
			Column::string('surname')->label('Surname'),
			Column::string('name')->label('Name'),
			Column::string('middlename')->label('Middlename'),
			Column::string('username')->label('Username'),
			Column::string('email')->label('Email'),
		]);
		return $display;
	})->create(function ()
	{
		$form = AdminForm::form();
		$form->items([
			FormItem::text('surname','Surname')->required(),
			FormItem::text('name','Name')->required(),
			FormItem::text('middlename','Middlename')->required(),
			FormItem::text('username', 'Username')->required()->unique(),
			FormItem::text('email', 'Email')->required()->unique(),
			FormItem::ckeditor("test", 'Test'),
		]);
		return $form;
	})->edit(function(){
		$form = AdminForm::form();
		$form->items([
			FormItem::text('surname','Surname')->required(),
			FormItem::text('name','Name')->required(),
			FormItem::text('middlename','Middlename')->required(),
			FormItem::text('email', 'Email')->required()->unique(),
		]);
		return $form;
	});