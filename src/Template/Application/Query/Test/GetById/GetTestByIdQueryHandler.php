<?php
namespace App\Template\Application\Query\Test\GetById;

use App\Template\Infrastructure\Persistence\InMemory\TestRepository;

class GetTestByIdQueryHandler
{
    private TestRepository $repository;

    public function __construct(TestRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(GetTestByIdQuery $query): array
    {
        $test = $this->repository->getTestById($query->id());
        $status = $this->repository->checkConnection();
        return [
            'status' => $status['status'],
            'error' => $status['error'],
            'name' => $test->name(),
        ];
    }
}
