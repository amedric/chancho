<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChanchoController extends AbstractController
{
    #[Route('/chancho', name: 'app_chancho')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->findAll();
        dd($category);
        return $this->render('chancho/index.html.twig', [
            'controller_name' => 'ChanchoController',
        ]);
    }
}
