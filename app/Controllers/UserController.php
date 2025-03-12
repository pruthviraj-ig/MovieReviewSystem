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
        $model = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        $model->save($data);
        return redirect()->to('/users/login');
    }

    public function login()
    {
        return view('users/login');
    }

    public function authenticate()
    {
        $model = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set(['user_id' => $user['id'], 'username' => $user['username'], 'logged_in' => true]);
            return redirect()->to('/movies');
        } else {
            return redirect()->to('/users/login')->with('error', 'Invalid Credentials');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/users/login');
    }
}
