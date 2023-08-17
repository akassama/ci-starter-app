<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
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
            'first_name' => [
                'type' => 'VARCHAR',
                 'constraint' => 250,
                ],
            'middle_names' => [
                'type' => 'VARCHAR',
                 'constraint' => 250,
                 'null' => true,
                ],
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                ],
            'dob' => [
                'type' => 'DATETIME',
                'null' => true,
                ],
            'status' => [
                'type' => 'INT',
                'Default' => 0,
            ],
            'active' => [
                'type' => 'INT',
                'Default' => 0,
            ],
            'updated_at datetime default current_timestamp on update current_timestamp',
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');

        //insert default records
        //----------------------
        $uuid = service('uuid');
        // will prepare UUID4 object
        $uuid4 = $uuid->uuid4();

        $data = [
            'user_id' => $uuid4->toString(),
            'first_name'    => 'Laiman',
            'middle_names'    => null,
            'last_name'    => 'Kasman',
            'email'    => 'akassama@yahoo.com',
            'password' => password_hash('#Ablie1', PASSWORD_DEFAULT),
            'dob'    => date('1990-10-19'),
            'status'    => 1,
            'active'    => 1,
        ];

        // Using Query Builder
        $this->db->table('users')->insert($data);
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
