<?php
namespace App\Template\Infrastructure\Persistence\InMemory;

use App\Template\Domain\Entity\Test\Test;
use App\Template\Domain\Entity\Test\TestRepositoryInterface;
use Doctrine\DBAL\Connection;

class TestRepository implements TestRepositoryInterface
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getTestById(int $id): ?Test
    {
        return new Test(1, 'Test Name'); // Simulating a test entity retrieval
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
