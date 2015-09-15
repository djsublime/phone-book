# Phone Book Web App

[preview](http://draganjovan.com/phone-book)

- This is just an example app and is made for the purpose of job interview.
- Phone book app is based on 3 great framework Laravel 4.2 Framework , AngularJS and Twitter Boostrap
- RESTfull way

## Installation
 ```
git clone https://github.com/djsublime/phone-book.git {directory} 
cd {directory}
composer install
sudo chmod -R 777 app/storage/
 ```

##DB setup
- create new database. (If MySQl DB server, user must have alter privilage.)
- in app/config/database.php set default connection and change connection values

 ```
php artisan migrate
php artisan db:seed
 ```

 !!!! if chosen db driver sqlite set sqlite file to be writable (exmp. sudo chmod -R 777 app/storage/) !!!!

##Frontend assets
 ```
cd {directory}/public
bower install
 ```

##Run Aplication

LAMP:
- Go to http://localhost/{app-path}/public

PHP SERVER / SQLITE:

 ```
php -S localhost:8080
 ```
 - Go to http://localhost:8080




## Official Laravel Framework Documentation

Documentation for the entire framework can be found on the [Laravel website](http://laravel.com/docs).

## Official AngularJS Framework Documentation

Documentation for the entire framework can be found on the [AngularJS website](https://angularjs.org/).

## Official Twitter Boostrap Framework Documentation

Documentation for the entire framework can be found on the [Boostrap website](http://getbootstrap.com).

### License

[MIT license](http://opensource.org/licenses/MIT)
