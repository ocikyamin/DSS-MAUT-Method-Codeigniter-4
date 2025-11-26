<?php

namespace App\Models;

use CodeIgniter\Model;

class AlternativeModel extends Model
{
    protected $table            = 'alternative';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];
}
