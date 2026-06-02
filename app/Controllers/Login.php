<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $session->set('isLoggedIn', true);
                $session->set('userEmail', $user['email']);

                return redirect()->to('/dashboard');
            } else {
                return redirect()->to('/login')->with('error', 'Wrong password');
            }
        } else {
            return redirect()->to('/login')->with('error', 'Email not found');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}