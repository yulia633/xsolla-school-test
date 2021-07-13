<?php

$container->set('database', function () {
    if ($url = getenv('CLEARDB_DATABASE_URL')) {
        $urlParts = parse_url($url);

        return [
            "DATABASE_HOST" => $urlParts['host'],
            "DATABASE_NAME" => substr($urlParts['path'], 1),
            "DATABASE_USER" => $urlParts['user'],
            "DATABASE_PASSWORD" => $urlParts['pass'],
            "DATABASE_CHAR" => 'utf8'
        ];
    }

    return [
        "DATABASE_HOST" => getenv('DATABASE_HOST') ?? 'mysql',
        "DATABASE_NAME" =>  getenv('DATABASE_NAME') ?? 'mydb',
        "DATABASE_USER" =>  getenv('DATABASE_USER') ?? 'root',
        "DATABASE_PASSWORD" =>  getenv('DATABASE_PASSWORD') ?? 'mysql',
        "DATABASE_CHAR" => 'utf8'
    ];
});
