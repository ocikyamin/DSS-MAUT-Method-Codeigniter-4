<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Matrix extends Seeder
{
     public function run()
    {
        $data = [
            // A1
            ['criteria_id' => 1, 'alternative_id' => 1, 'value' => 90], // C1
            ['criteria_id' => 2, 'alternative_id' => 1, 'value' => 70], // C2
            ['criteria_id' => 3, 'alternative_id' => 1, 'value' => 95], // C3
            ['criteria_id' => 4, 'alternative_id' => 1, 'value' => 80], // C4

            // A2
            ['criteria_id' => 1, 'alternative_id' => 2, 'value' => 85], // C1
            ['criteria_id' => 2, 'alternative_id' => 2, 'value' => 85], // C2
            ['criteria_id' => 3, 'alternative_id' => 2, 'value' => 90], // C3
            ['criteria_id' => 4, 'alternative_id' => 2, 'value' => 85], // C4

            // A3
            ['criteria_id' => 1, 'alternative_id' => 3, 'value' => 88], // C1
            ['criteria_id' => 2, 'alternative_id' => 3, 'value' => 80], // C2
            ['criteria_id' => 3, 'alternative_id' => 3, 'value' => 92], // C3
            ['criteria_id' => 4, 'alternative_id' => 3, 'value' => 90], // C4
        ];

        $this->db->table('matrix')->insertBatch($data);
    }
}
