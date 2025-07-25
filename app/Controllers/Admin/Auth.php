<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User;

class Auth extends BaseController
{
   public function login()
{
    helper(['form', 'url']);

    if ($this->request->getMethod(true) === 'POST') {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = User::where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user->password)) {
                session()->set('user_id', $user->id);
                session()->set('username', $user->username);

                // ✅ Redirecionar para o painel de gerenciamento de posts
                return redirect()->to('/admin/posts');
            } else {
                return view('admin/login', ['error' => 'Senha incorreta']);
            }
        } else {
            return view('admin/login', ['error' => 'Usuário não encontrado']);
        }
    }

    return view('admin/login');
}


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/login');
    }

    public function dashboard()
{
    echo 'Logado com sucesso!';
}
    public function register()
{
    helper(['form', 'url']);

    if ($this->request->getMethod() === 'POST') {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $user = new \App\Models\User();
        $user->username = $username;
        $user->password = $hash;
        $user->save();

        return redirect()->to('/admin/login')->with('success', "Usuário $username registrado com sucesso!");
    }

    return view('admin/register');
}


}
