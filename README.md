![PG Demidov Yaroslavl State University](https://upload.wikimedia.org/wikipedia/ru/2/28/Logo_demidovskiy_universitet.png)
# ЯрГУ им. П.Г.Демидова
## Сайт математического факультета

### Info

Это сайт для матфака ЯрГУ им. П.Г.Демидова 

Любые pull request-ы, содержащие bugfix-ы и новые полезные features приветствуются

### Требования к системе

* Наличие git
* Наличие composer
* Наличие PHP 5.6.* и новее (лучше 7.0)
* MySQL Server или другая база данных, которую поддерживает Laravel Framework и PHP с включеным соотв. модулем

### Информация по установке

* Склонировать `git clone https://github.com/mokeev1995/math.uniyar.ac.ru.git ` (если нужна самая последняя версия -- брать из dev ветки)
* Создать базу данных для сайта
* Сконфигурировать сайт в `/config/app.php` (вкл или выкл debug режима и так далее)
* Запустить `composer install` в папке с сайтом(корень сайта, тут валяется нужный ему `composer.json`).
* Запустить `php artisan october:up` 
* И теперь вы можете зайти в панель управления по адр. `{site address}/manager/` (или другому, установленному в `/config/cms.php`) и использовать сайт!)

### Contributors

* [Mokeev Andrey](http://mokeev1995.ru) \< andrey@mokeev1995.ru >

### Copyright and License

* The [Laravel framework](http://laravel.com) is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
* The [OctoberCMS (based on Laravel Framework)](https://github.com/octobercms/october) is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).