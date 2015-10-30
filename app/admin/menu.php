<?php

	Admin::menu()->url('/')->label('Начальная страница')->icon('fa-dashboard');
	Admin::menu(\App\Models\User::class)->label('Пользователи')->icon('fa-users');
	Admin::menu()->label("Преподаватели")->icon('fa-graduation-cap')->items(function(){
		Admin::menu(\App\Models\Degree::class)->label('Научн. степени');
	});