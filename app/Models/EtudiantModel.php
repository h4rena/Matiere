<?php

namespace App\Models;

use CodeIgniter\Model;

class EtudiantModel extends Model
{
    protected $table = 'etudiants';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $protectFields = true;
    protected $allowedFields = [
        'nom',
        'prenoms',
        'etu',
        'id_option',
    ];

    /**
     * Trouver un étudiant par ETU
     * 
     * @param string $etu
     * @return array|null
     */
    public function findByEtu($etu)
    {
        return $this->where('etu', $etu)->first();
    }

    /**
     * Récupérer tous les étudiants avec détails
     * 
     * @return array
     */
    public function getAllWithDetails()
    {
        return $this->select('etudiants.*, option.nom as option_nom')
            ->join('option', 'etudiants.id_option = option.id', 'left')
            ->findAll();
    }
}
