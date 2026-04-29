<?php

namespace App\Models;

use CodeIgniter\Model;

class PeriodeModel extends Model
{
    protected $table = 'periode';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $protectFields = true;
    protected $allowedFields = [
        'nom',
        'id_anne_univ',
        'id_option',
    ];

    /**
     * Récupérer tous les semestres
     * 
     * @return array
     */
    public function getAll()
    {
        return $this->orderBy('id', 'ASC')->findAll();
    }
}
