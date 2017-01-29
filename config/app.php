<?php

return [
    'boot' => [
        'settings' => [
            'displayErrorDetails' => true,
        ]
    ],
    'authHeader' => 'ASCOOTA-TOKEN',
    'key' => 'some_key_on_production',
    'tokenLife' => 6, //hours
    'logActions' => true
];
