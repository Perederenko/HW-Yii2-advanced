<?php
return [
    'readPost' => [
        'type' => 2,
        'description' => 'Read a post',
    ],
    'createPost' => [
        'type' => 2,
        'description' => 'Create a post',
    ],
    'updatePost' => [
        'type' => 2,
        'description' => 'Update a post',
    ],
    'deletePost' => [
        'type' => 2,
        'description' => 'Delete a post',
    ],
    'user' => [
        'type' => 1,
        'children' => [
            'readPost',
        ],
    ],
    'moderator' => [
        'type' => 1,
        'children' => [
            'updatePost',
            'user',
        ],
    ],
    'admin' => [
        'type' => 1,
        'children' => [
            'createPost',
            'deletePost',
            'moderator',
        ],
    ],
];
