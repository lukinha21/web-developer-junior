<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;

class Blog extends BaseController
{
    public function index()
    {
        $search = $this->request->getGet('q');
        $query = Post::orderBy('created_at', 'desc');

        if ($search) {
            $query->where('title', 'like', "%{$search}%");
        }

        $posts = $query->get();

        return view('blog/index', ['posts' => $posts, 'search' => $search]);
    }

    public function todos()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('blog/todos', ['posts' => $posts]);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        if (!$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Post não encontrado.");
        }

        return view('blog/show', ['post' => $post]);
    }

    public function search()
{
    $term = $this->request->getGet('q');

    $query = Post::orderBy('created_at', 'desc');

    if ($term) {
        $query->where('title', 'like', '%' . $term . '%');
    }

    $posts = $query->get();

    $results = $posts->map(function ($post) {
        return [
            'id' => $post->id,
            'title' => $post->title,
            'slug' => $post->slug,
            'image' => $post->image
        ];
    });

    return $this->response->setJSON($results);
}

}
