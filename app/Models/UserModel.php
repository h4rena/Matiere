<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $protectFields = true;
    protected $allowedFields = [
        'nom',
        'email',
        'mdp',
        'id_role',
    ];

    /**
     * Authentifier un utilisateur par email et mot de passe
     * 
     * @param string $email
     * @param string $password
     * @return array|null
     */
    public function authenticate($email, $password)
    {
        return $this->select('users.id, users.nom, users.email, users.id_role, role.nom as role_nom')
            ->join('role', 'users.id_role = role.id')
            ->where('email', $email)
            ->where('mdp', md5($password))
            ->first();
    }

    /**
     * Trouver un utilisateur par ID avec son rôle
     * 
     * @param int $id
     * @return array|null
     */
    public function getUserWithRole($id)
    {
        return $this->select('users.*, role.nom as role_nom')
            ->join('role', 'users.id_role = role.id')
            ->where('users.id', $id)
            ->first();
    }
}
