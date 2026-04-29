<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Vérifier si l'utilisateur est authentifié
        if (!session()->get('is_logged')) {
            return redirect()->to('/login');
        }

        // Si la route nécessite 'admin', vérifier le rôle
        if (!empty($arguments) && in_array('admin', $arguments)) {
            if (session()->get('user_role') !== 'Admin') {
                return redirect()->to('/')->with('error', 'Accès refusé. Admin requis.');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Rien à faire après
    }
}
