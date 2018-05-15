<?php

namespace App\Http\Controllers;

use App\Events\PostPublished;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Saves a new post to the database.
     */
    public function store(Request $request)
    {
        // ...
        // validation can be done here before saving
        // with $this->validate($request, $rules)
        // ...

        if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
            // Ignores notices and reports all other kinds... and warnings
            error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
            // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
        }

        // get data to save in an associative array using $request->only()
        $data = $request->only(['title', 'description']);

        //  save post and assign return value of created post to $post array
        $post = Post::create($data);

        // fire PostPublished event after post is successfully added to database
        event(new PostPublished($post));
        // or
        // \Event::fire(new PostPublished($post))

        // return post as response, Laravel automatically serializes this to JSON
        return response($post, 201);
    }
}
