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