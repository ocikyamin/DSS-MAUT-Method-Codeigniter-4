<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Kriteria extends Seeder
{
 public function run()
    {
        $data = [
            [
                'criteria_code'  => 'C1',
                'criteria_name'  => 'Nilai Rapor',
                'weight'         => 40,
            ],
            [
                'criteria_code'  => 'C2',
                'criteria_name'  => 'Prestasi Non-akademik',
                'weight'         => 30,
            ],
            [
                'criteria_code'  => 'C3',
                'criteria_name'  => 'Kehadiran',
                'weight'         => 20,
            ],
            [
                'criteria_code'  => 'C4',
                'criteria_name'  => 'Sikap/Etika',
                'weight'         => 10,
            ],
        ];

        // Insert banyak data langsung
        $this->db->table('criteria')->insertBatch($data);
    }

}
