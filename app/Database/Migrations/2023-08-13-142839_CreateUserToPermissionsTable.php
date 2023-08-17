<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserToPermissionsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'usigned'=>true, 
                'constraint' => 5, 
                'unsigned' => true, 
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => false
                ],
            'permission_id' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                ],
            'updated_at datetime default current_timestamp on update current_timestamp',
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('user_to_permissions');
    }
        

    public function down()
    {
        $this->forge->dropTable('user_to_permissions');
    }
}
