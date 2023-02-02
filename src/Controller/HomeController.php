<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(
        RecipeRepository $recipeRepository
    ): Response
    {
        $recipes = $recipeRepository->findAll();
        return $this->render('home/home.html.twig', [
            'recipes' => $recipes,
        ]);
    }
}
