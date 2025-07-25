<?php

namespace App\Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class EloquentBootstrap
{
    public static function start()
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => getenv('database.default.hostname'),
            'database'  => getenv('database.default.database'),
            'username'  => getenv('database.default.username'),
            'password'  => getenv('database.default.password'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
            'port'      => getenv('database.default.port') ?: 3306,
        ]);


        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}
