<?php
namespace App\Controller;

use App\Repository\TestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(TestRepository $dbRepo): Response
    {
        $result = $dbRepo->checkConnection();
        return $this->render('test/index.html.twig', [
            'dbStatus' => $result['status'],
            'error' => $result['error'],
        ]);
    }
}
