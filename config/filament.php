<?php

return [
    'auth' => [
        'guard' => 'web',
        'check' => function ($user) {
            return $user && $user->email === 'emoyocarol@gmail.com';
        },
    ],

];
