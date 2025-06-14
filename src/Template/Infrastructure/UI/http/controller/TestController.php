<?php
namespace App\Template\Infrastructure\UI\http\controller;

use App\Template\Application\Query\Test\GetById\GetTestByIdQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\Exception\ExceptionInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @throws ExceptionInterface
     */
    #[Route('/', name: 'homepage')]
    public function index(MessageBusInterface $commandBus): Response
    {
        $envelope = $commandBus->dispatch(new GetTestByIdQuery(1));
        $result = $envelope->last(HandledStamp::class)->getResult();
        return $this->render('@Template/Test/index.html.twig', [
            'dbStatus' => $result['status'],
            'error' => $result['error'],
            'name' => $result['name'],
        ]);
    }
}
