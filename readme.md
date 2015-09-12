# Phone Book web php 5 app

[preview](http://draganjovan.com/phone-book)

Phone book app is based on Laravel 4.2 Framework

## Installation
 ```
clone https://github.com/djsublime/phone-book.git {directory} 
cd {directory}
sudo chmod -R 777 app/storage/
 ```

##DB setup
- create new database.
- DB user must have alter privilage on DB
 ```
php artisan migrate
php artisan db:seed
 ```

##Frontend assets
 ```
cd {directory}/public
bower install
 ```

 Go to http://localhost/{app-path}/public



## Official Laravel Framework Documentation

Documentation for the entire framework can be found on the [Laravel website](http://laravel.com/docs).

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
