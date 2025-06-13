<?php
namespace App\Repository;

use Doctrine\DBAL\Connection;

class TestRepository
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function checkConnection(): array
    {
        try {
            $this->connection->connect();
            return ['status' => true, 'error' => null];
        } catch (\Exception $e) {
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }
}
