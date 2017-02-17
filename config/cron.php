<?php

return [
    'jobs' => [
        [
            'name' => 'fixPodcastLinks',
            'class_name' => 'FixPodcastLinks',
            'args' => null,
            'delta_minutes' => 60 * 24,
            'active' => true,
            'fire_time' => null,
            'priority' => 0
        ],
        [
            'name' => 'fetchNewPodcasts',
            'class_name' => 'FetchNewPodcasts',
            'args' => null,
            'delta_minutes' => 60 * 24,
            'active' => true,
            'fire_time' => null,
            'priority' => 1
        ]
    ],
    'namespaces' => [
        'App\Scripts\\'
    ]
];
