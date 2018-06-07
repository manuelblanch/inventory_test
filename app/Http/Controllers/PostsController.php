<?php

// app/controllers/PostsController.php

namespace App\Http\Controllers;


class PostsController extends Controller
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post->all();

        return View::make('posts.index')
          ->with('posts', $posts);
    }
}
