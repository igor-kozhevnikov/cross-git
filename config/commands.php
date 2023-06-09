<?php

return [
    \Cross\Git\Commands\Add::class => [
        'options' => null,
    ],
    \Cross\Git\Commands\Commit::class => [
        'options' => '-a',
    ],
    \Cross\Git\Commands\Push::class => [
        'options' => '-u',
    ],
    \Cross\Git\Commands\Snapshot::class => [
        'is_use_add' => true,
        'is_use_commit' => true,
        'is_use_push' => true,
    ],
];
