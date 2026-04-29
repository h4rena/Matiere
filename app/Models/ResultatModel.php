<?php

namespace App\Models;

use CodeIgniter\Model;

class ResultatModel extends Model
{
    protected $table = 'resultat';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $protectFields = true;
    protected $allowedFields = [
        'id_etudiant',
        'total_note',
        'moyenne_general',
        'total_credit',
        'mention',
        'situation',
    ];
}
