<?php

// app/controllers/PostsController.php

class PostsController extends BaseController
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
