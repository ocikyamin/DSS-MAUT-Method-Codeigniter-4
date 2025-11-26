<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KriteriaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=> [
                'type'=> 'INT',
                'constraint'=> 11,
                'unsigned'=> true,
                'auto_increment'=> true,
            ],
            'criteria_code'=>[
                'type'=> 'VARCHAR',
                'constraint'=> 30,
                'null'=> true
            ],
            'criteria_name'=>[
                'type'=> 'VARCHAR',
                'constraint'=> 100,
                'null'=> true
            ],
            'weight'=>[
                'type'=> 'VARCHAR',
                'constraint'=> 30,
                'null'=> true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('criteria');
    }
    
    public function down()
    {
        $this->forge->dropTable('criteria', true);
        //
    }
}
