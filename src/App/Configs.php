<?php

//Get Heroku ClearDB connection information
$cleardb_url      = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server   = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db       = substr($cleardb_url["path"],1);

$container->set('database', function () use ($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db) {
    return (object) [
        'default' => [
            "DATABASE_HOST" => $cleardb_server,
            "DATABASE_NAME" => $cleardb_username,
            "DATABASE_USER" => $cleardb_password,
            "DATABASE_PASSWORD" => $cleardb_db,
            "DATABASE_CHAR" => 'utf8'
        ]
    ];
});

// $container->set('database', function () {
//     return (object) [
//         'default' => [
//             "DATABASE_HOST" => 'mysql',
//             "DATABASE_NAME" => 'mydb',
//             "DATABASE_USER" => 'root',
//             "DATABASE_PASSWORD" => 'mysql',
//             "DATABASE_CHAR" => 'utf8'
//         ]
//     ];
// });
