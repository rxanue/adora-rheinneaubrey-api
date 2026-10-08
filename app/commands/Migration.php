<?php

class Migration
{
    public static $command = 'migration';

    public static $description = 'Run database migrations';

    public static $arguments = [
        '[action]' => 'Action: run, create-migration, rollback, rollback-all, refresh, status',
        '[name]' => 'Migration name for create-migration',
    ];

    protected static $route_map = [
        'run' => 'migrate',
        'create-migration' => 'create-migration',
        'rollback' => 'rollback',
        'rollback-all' => 'rollback-all',
        'refresh' => 'refresh',
        'status' => 'status',
    ];

    public function handle($input = null, array $flags = [])
    {
        $action = $input ?? 'run';

        $name = $flags['name'] ?? null;

        if ($action === 'create-migration') {
            if (!$name) {
                echo danger("Migration name is required.") . PHP_EOL;
                echo "Example: php lava migration create-migration --name=create_products_table"
                    . PHP_EOL;
                exit(1);
            }

            $route = 'create-migration/' . $name;
        } else {
            if (!isset(static::$route_map[$action])) {
                echo danger("Unknown migration action: \"{$action}\"") . PHP_EOL;
                echo "Available actions: "
                    . implode(', ', array_keys(static::$route_map))
                    . PHP_EOL;
                exit(1);
            }

            $route = static::$route_map[$action];
        }

        $index = PUBLIC_DIR . 'index.php';

        if (!file_exists($index)) {
            echo danger("index.php not found at: {$index}") . PHP_EOL;
            exit(1);
        }

        $command = 'php '
            . escapeshellarg($index)
            . ' '
            . escapeshellarg($route);

        passthru($command);
    }
}   