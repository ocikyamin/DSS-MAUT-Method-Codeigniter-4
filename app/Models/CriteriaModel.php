<?php

namespace App\Models;

use CodeIgniter\Model;

class CriteriaModel extends Model
{
    protected $table            = 'criteria';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];
}
