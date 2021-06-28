<?php

$container->set('database', function () {
    return (object) [
        'default' => [
            "DATABASE_HOST" => 'mysql',
            "DATABASE_NAME" => 'mydb',
            "DATABASE_USER" => 'root',
            "DATABASE_PASSWORD" => 'mysql',
            "DATABASE_CHAR" => 'utf8'
        ]
    ];
});
