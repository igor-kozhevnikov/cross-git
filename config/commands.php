<?php

return [
    \Cross\Git\Commands\Add::class => [
        'options' => null,
    ],
    \Cross\Git\Commands\Commit::class => [
        'options' => '-a',
        // 'message' => [
        //     'handlers' => [
        //         \Cross\Git\Text\Handlers\Cases\FirstUppercase::class,
        //         \Cross\Git\Text\Handlers\Jira\Issue::class => [
        //             'project' => \Cross\Git\Text\Extractors\Jira\ProjectFromBranch::class,
        //             'issue' => \Cross\Git\Text\Extractors\Jira\IssueFromBranch::class,
        //         ],
        //     ],
        // ],
    ],
    \Cross\Git\Commands\Push::class => [
        'options' => '-u',
    ],
    \Cross\Git\Commands\Snapshot::class => [
        'is_use_add' => true,
        'is_use_commit' => true,
        'is_use_push' => true,
    ],
    \Cross\Git\Commands\Feature\Swap::class => [
        'project' => null,
    ],
    \Cross\Git\Commands\Feature\Create::class => [
        'project' => null,
    ],
];
