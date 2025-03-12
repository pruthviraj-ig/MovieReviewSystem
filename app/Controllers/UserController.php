<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    public function register()
    {
        return view('users/register');
    }

    public function store()
    {
        $userModel = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];
        $userModel->save($data);
        return redirect()->to('/users/login')->with('success', 'Registration successful! Please log in.');
    }

    public function login()
    {
        return view('users/login');
    }

    public function authenticate()
    {
        $userModel = new UserModel();
        $user = $userModel->where('email', $this->request->getPost('email'))->first();

        if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
            session()->set([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'logged_in' => true,
            ]);
            return redirect()->to('/movies');
        }

        return redirect()->to('/users/login')->with('error', 'Invalid credentials.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/users/login');
    }
}
