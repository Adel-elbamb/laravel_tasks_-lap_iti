<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    private $posts = [
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

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index', ['posts' => $this->posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'author' => 'required|string|max:100',
        ]);

        $newPost = [
            'id' => count($this->posts) + 1,
            'title' => $validated['title'],
            'body' => $validated['body'],
            'author' => $validated['author'],
            'created_at' => now()->toDateString(),
        ];

        $this->posts[] = $newPost;

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = collect($this->posts)->firstWhere('id', $id);

        if (!$post) {
            abort(404, 'Post not found');
        }

        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = collect($this->posts)->firstWhere('id', $id);

        if (!$post) {
            abort(404, 'Post not found');
        }

        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'author' => 'required|string|max:100',
        ]);

        $postIndex = collect($this->posts)->search(function ($post) use ($id) {
            return $post['id'] == $id;
        });

        if ($postIndex === false) {
            abort(404, 'Post not found');
        }

        $this->posts[$postIndex] = [
            'id' => $id,
            'title' => $validated['title'],
            'body' => $validated['body'],
            'author' => $validated['author'],
            'created_at' => $this->posts[$postIndex]['created_at'],
        ];

        return redirect()->route(' Fairbanks.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $postIndex = collect($this->posts)->search(function ($post) use ($id) {
            return $post['id'] == $id;
        });

        if ($postIndex === false) {
            abort(404, 'Post not found');
        }

        unset($this->posts[$postIndex]);

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
