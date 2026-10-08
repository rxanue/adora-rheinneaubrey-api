<?php

class reset_admin_password
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
            'is_active' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'unsigned'   => TRUE,
                'null'       => FALSE,
                'default'    => 1
            ]
        ]);

        echo "Added is_active column to users table." . PHP_EOL;

        $password = password_hash('Admin@12345', PASSWORD_DEFAULT);

        $this->_lava->db
            ->table('users')
            ->where('username', 'admin')
            ->update([
                'password'  => $password,
                'role'      => 'admin',
                'is_active' => 1
            ]);

        echo "Admin password reset successfully." . PHP_EOL;
    }

    public function down()
    {
        echo "Password reset migration rollback does not change the password." . PHP_EOL;
    }
}