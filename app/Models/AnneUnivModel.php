<?php

namespace App\Models;

use CodeIgniter\Model;

class AnneUnivModel extends Model
{
    protected $table = 'anne_univ';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $protectFields = true;
    protected $allowedFields = [
        'nom',
    ];
}
