<?php

	Admin::menu()->url('/')->label('Start page')->icon('fa-dashboard');
	Admin::menu(\App\Models\User::class)->label('Manage Users')->icon('fa-users');
	Admin::menu()->label("Professors")->icon('fa-graduation-cap')->items(function(){
		Admin::menu(\App\Models\Degree::class)->label('Degrees');
	});