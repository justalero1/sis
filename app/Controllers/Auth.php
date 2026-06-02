<?php

namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController {

    public function register() {
        return view('register');
    }

    public function saveRegister() {
        $model = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => 'user',
        ];

        $model->save($data);
        return redirect()->to('/login')->with('success', 'Registration successful. Please log in.');
    }

    public function login() {
        return view('login');
    }

    public function checkLogin() {
        $model = new UserModel();
        $session = session();

        $user = $model->where('email', $this->request->getPost('email'))->first();

        if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
            $session->set([
                'isLoggedIn' => true,
                'user_id'    => $user['id'],
                'username'   => $user['username'],
                'email'      => $user['email'],
                'role'       => ($user['username'] === 'admin' || $user['email'] === 'admin@example.com') ? 'admin' : 'user',
            ]);

            return redirect()->to('/dashboard');
        }

        return redirect()->to('/login')->with('error', 'Login Failed');
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/login');
    }
}
