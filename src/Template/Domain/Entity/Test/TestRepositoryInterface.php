<?php
namespace App\Template\Domain\Entity\Test;

interface TestRepositoryInterface
{
    public function getTestById(int $id): ?Test;
}

