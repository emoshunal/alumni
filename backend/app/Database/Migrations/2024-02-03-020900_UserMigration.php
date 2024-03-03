<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'course' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'batch' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'employment' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'role' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            
        'created_at timestamp default current_timestamp',
        'updated_at timestamp default current_timestamp on update current_timestamp'
        ]);



        $this->forge->addKey('id', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
