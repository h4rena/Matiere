<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login(): string
    {
        return view('auth/login');
    }

    public function doLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if (!$email || !$password) {
            return redirect()->back()->with('error', 'Email et mot de passe requis');
        }

        // Authentifier l'utilisateur via le Model
        $user = $this->userModel->authenticate($email, $password);

        if ($user) {
            // Authentification réussie
            session()->set([
                'user_id' => $user['id'],
                'user_nom' => $user['nom'],
                'user_email' => $user['email'],
                'user_role' => $user['role_nom'],
                'is_logged' => true
            ]);
            return redirect()->to('/');
        } else {
            // Authentification échouée
            return redirect()->back()->with('error', 'Email ou mot de passe incorrect');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
