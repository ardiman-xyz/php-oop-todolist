<?php

function getDatabaseConfig(): array
{

    return [
        "database" => [
            "test" => [
                "url" => "mysql:host=localhost:3307;dbname=todolist_php_test",
                "username" => "root",
                "password" => ""
            ],
            "prod" => [
                "url" => "mysql:host=localhost:3307;dbname=todolist_php",
                "username" => "root",
                "password" => ""
            ]
        ]
    ];
}
