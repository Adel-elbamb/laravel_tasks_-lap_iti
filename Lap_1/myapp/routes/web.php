<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test', function () {
    return view('test');
});



Route::get('/posts', function () {
    $posts = [
        [
            'id' => 1,
            'title' => 'Getting Started with Laravel',
            'body' => 'Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling.',
            'author' => 'Taylor Otwell',
            'created_at' => '2023-01-15'
        ],
        [
            'id' => 2,
            'title' => 'Eloquent ORM Explained',
            'body' => 'The Eloquent ORM included with Laravel provides a beautiful, simple ActiveRecord implementation for working with your database.',
            'author' => 'Jeffrey Way',
            'created_at' => '2023-02-20'
        ],
        [
            'id' => 3,
            'title' => 'Blade Templating Engine',
            'body' => 'Blade is the simple, yet powerful templating engine provided with Laravel. Unlike other PHP templating engines, Blade does not restrict you from using plain PHP code in your views.',
            'author' => 'Sarah Smith',
            'created_at' => '2023-03-10'
        ],
        [
            'id' => 4,
            'title' => 'Laravel Authentication',
            'body' => 'Laravel makes implementing authentication very simple. In fact, almost everything is configured for you out of the box.',
            'author' => 'Alex Garrett',
            'created_at' => '2023-04-05'
        ],
        [
            'id' => 5,
            'title' => 'Database Migrations',
            'body' => 'Migrations are like version control for your database, allowing your team to modify and share the application\'s database schema.',
            'author' => 'Jessica Brown',
            'created_at' => '2023-05-12'
        ],
        [
            'id' => 6,
            'title' => 'Testing in Laravel',
            'body' => 'Laravel is built with testing in mind. In fact, support for testing with PHPUnit is included out of the box.',
            'author' => 'Michael Johnson',
            'created_at' => '2023-06-18'
        ]
    ];

    return view('posts.index', ['posts' => $posts]);
});





