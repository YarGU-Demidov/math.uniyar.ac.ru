![PG Demidov Yaroslavl State University](https://upload.wikimedia.org/wikipedia/ru/2/28/Logo_demidovskiy_universitet.png)
# PG Demidov Yaroslavl State University
## Math faculty site

### Info

This is site for Math. Faculty of PG Demidov Yaroslavl State University. 

Any pull requests and bug reports are welcome.

### Installation Requirements

* git
* composer
* PHP 5.6.*
* MySQL Server or other database server supported by Laravel Framework and PHP with enabled module for PHP

### Installation Info

* Clone repo to your server `git clone https://github.com/mokeev1995/math.uniyar.ac.ru.git `
* Create database for site
* Configure connection string in `/config/app.php` and others options (turn off or on debug and so one)
* Run `composer install` in directory with site.
* Launch `php artisan october:up` 
* Now you can enter to admin panel `{site address}/manager/` (or other path, set in `/config/cms.php`) and use site

### Contributors

* [Mokeev Andrey](http://mokeev1995.ru) \< andrey@mokeev1995.ru >

### Copyright and License

* The [Laravel framework](http://laravel.com) is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
* The [OctoberCMS (based on Laravel Framework)](https://github.com/octobercms/october) is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
