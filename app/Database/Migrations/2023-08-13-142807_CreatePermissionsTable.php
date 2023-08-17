<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePermissionsTable extends Migration
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
            'permission_id' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],
            'permission_name' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => true,
            ],
            'updated_at datetime default current_timestamp on update current_timestamp',
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('permissions');

        //insert default records
        //----------------------
        $uuid = service('uuid');
        // will prepare UUID4 object
        $uuid4 = $uuid->uuid4();

        $data = [
            [
                'permission_id' => $uuid4->toString(),
                'permission_name'    => 'viewer',
                'description'    => 'A view only access',
            ],
            [
                'permission_id' => $uuid4->toString(),
                'permission_name'    => 'user',
                'description'    => 'A user access',
            ],
            [
                'permission_id' => $uuid4->toString(),
                'permission_name' => 'editor',
                'description' => 'An editor access',
            ],
            [
                'permission_id' => $uuid4->toString(),
                'permission_name' => 'admin',
                'description' => 'An administrator access',
            ]
        ];

        // Using Query Builder
        $this->db->table('permissions')->insertBatch($data);
    }
        

    public function down()
    {
        $this->forge->dropTable('permissions');
    }
}
