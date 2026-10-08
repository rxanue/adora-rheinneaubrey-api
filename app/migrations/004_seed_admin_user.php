<?php

class Seed_admin_user
{
    private $_lava;

    public function __construct()
    {
        $this->_lava = lava_instance();
        $this->_lava->call->database();
    }

    public function up()
    {
        $existing = $this->_lava->db
            ->table('users')
            ->where('username', 'admin')
            ->get();

        if ($existing) {
            echo "Admin user already exists. Skipping." . PHP_EOL;
            return;
        }

        $password = password_hash('Admin@12345', PASSWORD_DEFAULT);

        $this->_lava->db
            ->table('users')
            ->insert([
                'username'   => 'admin',
                'email'      => 'admin@example.com',
                'password'   => $password,
                'role'       => 'admin',
                'is_active'  => 1
            ]);

        echo "Admin user created successfully." . PHP_EOL;
    }

    public function down()
    {
        $this->_lava->db
            ->table('users')
            ->where('username', 'admin')
            ->delete();

        echo "Admin user removed successfully." . PHP_EOL;
    }
}