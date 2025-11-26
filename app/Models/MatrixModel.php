<?php

namespace App\Models;

use CodeIgniter\Model;

class MatrixModel extends Model
{
    protected $table = 'matrix';
    protected $allowedFields = ['criteria_id', 'alternative_id', 'value'];

}
