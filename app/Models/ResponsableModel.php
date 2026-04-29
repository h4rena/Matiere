<?php

namespace App\Models;

use CodeIgniter\Model;

class ResponsableModel extends Model
{
    protected $table = 'responsable';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $protectFields = true;
    protected $allowedFields = [
        'nom',
    ];
}
