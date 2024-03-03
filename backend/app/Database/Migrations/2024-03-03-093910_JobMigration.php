<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JobMigration extends Migration
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
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'company' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'posted_by' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'location' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'verified' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'created_at timestamp default current_timestamp',
            'updated_at timestamp default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('job');
    }
    public function down()
    {
        $this->forge->dropTable('job');
    }
}
