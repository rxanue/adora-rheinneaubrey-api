<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class MigrationController extends Controller
{
    protected $migration;

    public function __construct()
    {
        parent::__construct();

        $this->migration = $this->call->library('migration');
    }

    public function migrate()
    {
        $this->migration->migrate();

        echo "Migrations completed successfully." . PHP_EOL;
    }

    public function create_migration($name = null)
    {
        if (!$name) {
            show_404();
            return;
        }

        $file = $this->migration->create_migration($name);

        if ($file) {
            echo "Migration created successfully: {$file}" . PHP_EOL;
        }
    }

    public function rollback()
    {
        $this->migration->rollback();

        echo "Migration rollback completed successfully." . PHP_EOL;
    }

    public function rollback_all()
    {
        $this->migration->rollback_all();

        echo "All migrations rolled back successfully." . PHP_EOL;
    }

    public function refresh()
    {
        $this->migration->refresh();

        echo "Migrations refreshed successfully." . PHP_EOL;
    }

    public function status()
    {
        $this->migration->status();
    }
}