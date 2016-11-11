# periods

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Laravel 5 packages to support multiple database connections for 
historical data (One period -> One database connection)

## Install

Via Composer

``` bash
$ composer require acacha/periods
```

Add **PeriodsServiceProvider** service provider to **config/app.php** file:

```php
...
 /*
         * Package Service Providers...
         */
        Acacha\Periods\Providers\PeriodsServiceProvider::class,
...
```

Publish files with:

```php
php artisan vendor:publish --tag=acacha_periods
``` 

## Usage

Register Laravel Middleware on class **App\Http\Kernel.php** at the end
of web middleware group:

``` php
...
 protected $middlewareGroups = [
        'web' => [
            ...
            \Acacha\Periods\Middleware\Periods::class
        ],
...
```

Customize your config. First adapt to your needs fil **config/periods.php**:

```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Session variable name for periods
    |--------------------------------------------------------------------------
    |
    | This value is the name of the session vairable that storages desired period.
    */

    'session_variable' => 'ACACHA_PERIOD',

    /*
    |--------------------------------------------------------------------------
    | Valid period values and related database connections
    |--------------------------------------------------------------------------
    |
    | This value is an array that stores valid period values and his related
    | database connections.
    */

    'periods' => [
        '2016-17' => env('DB_CONNECTION', 'mysql'),
        '2015-16' => env('DB_CONNECTION', 'mysql') . '_1516',
        '2014-15' => env('DB_CONNECTION', 'mysql') . '_1415',
    ],

];
```

By sure that you have multiple database connections 
(default sqlite, sqlite_1516, sqlite_1415...) at config file **config/database.php**:

```php
...
    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
        ],

        'sqlite_1516' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database1516.sqlite')),
            'prefix' => '',
        ],

        'sqlite_1415' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database1415.sqlite')),
            'prefix' => '',
        ],
...
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email sergiturbadenas@gmail.com instead of using the issue tracker.

## Credits

- [Sergi Tur Badenas][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/acacha/periods.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/acacha/periods/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/acacha/periods.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/acacha/periods.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/acacha/periods.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/acacha/periods
[link-travis]: https://travis-ci.org/acacha/periods
[link-scrutinizer]: https://scrutinizer-ci.com/g/acacha/periods/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/acacha/periods
[link-downloads]: https://packagist.org/packages/acacha/periods
[link-author]: https://github.com/acacha
[link-contributors]: ../../contributors
