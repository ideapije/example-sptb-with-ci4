<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSptbTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'departure_date' => [
                'type'      => 'DATE'
            ],
            'customer' => [
                'type' => 'VARCHAR',
                'constraint'=> '100'
            ],
            'project' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ], 
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('sptb');
    }

    public function down()
    {
        $this->forge->dropTable('sptb');
    }
}
