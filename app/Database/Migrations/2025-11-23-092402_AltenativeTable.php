<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AltenativeTable extends Migration
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
            'alternative_code'=>[
                'type'=> 'VARCHAR',
                'constraint'=> 30,
                'null'=> true
            ],
            'alternative_name'=>[
                'type'=> 'VARCHAR',
                'constraint'=> 255,
                'null'=> true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('alternative');
        
    }
    
    public function down()
    {
        $this->forge->dropTable('alternative', true);
        //
    }
}
