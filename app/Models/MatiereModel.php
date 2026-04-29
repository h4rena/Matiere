<?php

namespace App\Models;

use CodeIgniter\Model;

class MatiereModel extends Model
{
    protected $table = 'matieres';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $protectFields = true;
    protected $allowedFields = [
        'nom',
        'code',
        'coefficient',
        'credit',
        'id_parcours',
        'id_periode',
    ];

    /**
     * Récupérer toutes les matières avec détails
     * 
     * @return array
     */
    public function getAllWithDetails()
    {
        return $this->select('matieres.*, p.nom as periode_nom')
            ->join('periode p', 'matieres.id_periode = p.id', 'left')
            ->orderBy('matieres.nom', 'ASC')
            ->findAll();
    }

    /**
     * Récupérer les matières par période
     * 
     * @param int $id_periode
     * @return array
     */
    public function getByPeriode($id_periode)
    {
        return $this->where('id_periode', $id_periode)
            ->orderBy('nom', 'ASC')
            ->findAll();
    }
}
