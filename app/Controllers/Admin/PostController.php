<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Post;
use CodeIgniter\HTTP\Files\UploadedFile;
use App\Models\User; 


class PostController extends BaseController
{
public function index()
{
    $search = $this->request->getGet('search');
    $startDate = $this->request->getGet('start_date');
    $endDate = $this->request->getGet('end_date');

    $postModel = new Post();

    $builder = $postModel->newQuery();

    if ($search) {
        $builder->where('title', 'like', '%' . $search . '%');
    }

    if ($startDate) {
        $builder->where('created_at', '>=', $startDate . ' 00:00:00');
    }

    if ($endDate) {
        $builder->where('created_at', '<=', $endDate . ' 23:59:59');
    }

    // Retorna todos os posts com base no filtro
    $posts = $builder->orderBy('created_at', 'desc')->get();

    $data = [
        'posts' => $posts,
        'totalPosts' => $posts->count(),
        'searchTerm' => $search,
        'startDate' => $startDate,
        'endDate' => $endDate,
    ];

    return view('admin/posts/index', $data);
}




    public function dashboard()
    {
        $totalUsers = User::count();
        $totalPosts = Post::count();
        $postsThisWeek = Post::where('created_at', '>=', date('Y-m-d', strtotime('-7 days')))->count();
        $earnings = 1060386; // valor fake por enquanto

        $recentPosts = Post::orderBy('created_at', 'desc')->limit(3)->get();

        return view('admin/dashboard', compact('totalUsers', 'totalPosts', 'postsThisWeek', 'earnings', 'recentPosts'));
    }

   public function store()
    {
        $data = $this->request->getPost();
        $image = $this->request->getFile('image');

        if ($image && $image->isValid()) {
            $newName = $image->getRandomName();
            $image->move('public/uploads', $newName);
            $data['image'] = $newName;
        }

        $data['slug'] = url_title($data['title'], '-', true);

        $data['user_id'] = session('user_id');

        Post::create($data);

        return redirect()->to('/admin/posts')->with('success', 'Post criado!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin/posts/edit', compact('post'));
    }

    public function update($id)
    {
        $post = Post::findOrFail($id);
        $data = $this->request->getPost();
        $image = $this->request->getFile('image');

        if ($image && $image->isValid()) {
            $newName = $image->getRandomName();
            $image->move('public/uploads', $newName);
            $data['image'] = $newName;
        }

        $data['slug'] = url_title($data['title'], '-', true);
        $post->update($data);

        return redirect()->to('/admin/posts')->with('success', 'Post atualizado!');
    }

    public function create()
{
    return view('admin/posts/create');
}

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->to('/admin/posts')->with('success', 'Post deletado!');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin/posts/show', compact('post'));
    }

    
}
