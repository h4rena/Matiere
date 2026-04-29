<?php

namespace App\Models;

use CodeIgniter\Model;

class OptionModel extends Model
{
    protected $table = 'option';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $protectFields = true;
    protected $allowedFields = [
        'nom',
    ];

    /**
     * Récupérer toutes les options
     * 
     * @return array
     */
    public function getAll()
    {
        return $this->orderBy('nom', 'ASC')->findAll();
    }
}
