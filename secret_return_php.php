<?php

function func_return_simple_secret($event, $context)
{
    $secret1 = getenv('SECRET_1');
    $secret2 = getenv('SECRET_2');

    return [
            'status' => 200,
            'data' => [
                'secrets' => [
                    getenv('SECRET_1'),
                    getenv('SECRET_2'),
                ]
            ]
        ];
}
