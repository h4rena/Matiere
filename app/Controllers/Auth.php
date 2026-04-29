<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login(): string
    {
        return view('auth/login');
    }

    public function doLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Récupérer l'utilisateur depuis la BD
        $db = \Config\Database::connect();
        $user = $db->table('users')
            ->select('users.id, users.nom, users.email, users.mdp, role.nom as role')
            ->join('role', 'users.id_role = role.id')
            ->where('email', $email)
            ->get()
            ->getRowArray();

        if ($user && md5($password) === $user['mdp']) {
            // Authentification réussie
            session()->set([
                'user_id' => $user['id'],
                'user_nom' => $user['nom'],
                'user_email' => $user['email'],
                'user_role' => $user['role'],
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
