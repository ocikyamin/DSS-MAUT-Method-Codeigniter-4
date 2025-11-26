<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MatrixTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=> [
                'type'=> 'INT',
                 'constraint'=>11,
                'unsigned'=> true,
                'auto_increment'=> true

            ],
           'criteria_id'=> [
    'type'=> 'INT',
    'constraint'=>11,
    'unsigned'=> true, // WAJIB
    'null'=> false
],
'alternative_id'=> [
    'type'=> 'INT',
    'constraint'=>11,
    'unsigned'=> true, // WAJIB
    'null'=> false
],

            'value'=> [
                 'type'=> 'VARCHAR',
                 'constraint'=>30,
                 'null'=> true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('criteria_id', 'criteria','id', 'CASCADE','CASCADE');
        $this->forge->addForeignKey('alternative_id', 'alternative','id', 'CASCADE','CASCADE');
        $this->forge->createTable('matrix');
    }
    
    public function down()
    {
        $this->forge->dropTable('matrix', true);
        //
    }
}
