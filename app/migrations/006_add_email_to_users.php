<?php

class add_email_to_users
{
    private $_lava;

    public function __construct()
    {
        $this->_lava = lava_instance();
        $this->_lava->call->dbforge();
        $this->_lava->call->database();
    }

    public function up()
    {
        $this->_lava->dbforge->add_column('users', [
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => TRUE
            ]
        ]);

        echo "Added email column to users table." . PHP_EOL;

        $this->_lava->db
            ->table('users')
            ->where('username', 'admin')
            ->update([
                'email' => 'admin@example.com'
            ]);

        echo "Admin email updated successfully." . PHP_EOL;
    }

    public function down()
    {
        $this->_lava->dbforge->drop_column('users', 'email');

        echo "Email column removed from users table." . PHP_EOL;
    }
}