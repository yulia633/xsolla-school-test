<?php

use Psr\Container\ContainerInterface;

$container->set('db', function (ContainerInterface $c) {

    $config = $c->get('database');

    $DB_HOST = $config['DATABASE_HOST'];
    $DB_NAME = $config['DATABASE_NAME'];
    $DB_USER = $config['DATABASE_USER'];
    $DB_PASSWORD = $config['DATABASE_PASSWORD'];
    $DB_CHARSET = $config['DATABASE_CHAR'];

    $DSN = "mysql:host={$DB_HOST};dbname={$DB_NAME};charset={$DB_CHARSET}";

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    return new PDO($DSN, $DB_USER, $DB_PASSWORD, $options);
});
