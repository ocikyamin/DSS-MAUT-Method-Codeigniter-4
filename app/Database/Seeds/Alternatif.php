<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Alternatif extends Seeder
{
    public function run()
    {
        $data = [
            [
                'alternative_code' => 'A1',
                'alternative_name' => 'Andi',
            ],
            [
                'alternative_code' => 'A2',
                'alternative_name' => 'Budi',
            ],
            [
                'alternative_code' => 'A3',
                'alternative_name' => 'Citra',
            ],
        ];

        $this->db->table('alternative')->insertBatch($data);
    }
}
