<?php
namespace App\Tests\Repository;

use App\Repository\TestRepository;
use Doctrine\DBAL\Connection;
use PHPUnit\Framework\TestCase;

class TestRepositoryTest extends TestCase
{
    public function testCheckConnectionReturnsStatusTrueOnSuccess()
    {
        $connection = $this->createMock(Connection::class);
        $connection->expects($this->once())
            ->method('connect')
            ->willReturn(true);

        $repo = new TestRepository($connection);
        $result = $repo->checkConnection();

        $this->assertTrue($result['status']);
        $this->assertNull($result['error']);
    }

    public function testCheckConnectionReturnsStatusFalseOnFailure()
    {
        $connection = $this->createMock(Connection::class);
        $connection->expects($this->once())
            ->method('connect')
            ->willThrowException(new \Exception('Connection failed!'));

        $repo = new TestRepository($connection);
        $result = $repo->checkConnection();

        $this->assertFalse($result['status']);
        $this->assertEquals('Connection failed!', $result['error']);
    }
}

