<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddComments extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => 255,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'comment' => [
                'type' => 'TEXT',
                'constraint' => 1000
            ],
            'comment_by' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'comment_post' => [
                'type' => 'BIGINT',
                'constraint' => 255,
                'unsigned' => true
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
            'deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('comments');
    }

    public function down()
    {
        $this->forge->dropTable('comments');
    }
}
