<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use App\Repository\ProductRepository;
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $productRepository = $this->getDoctrine()->getRepository(Product::class);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'mostRecentProducts' => $productRepository->findMostRecent(5),
            'cheapestProducts' => $productRepository->findCheapest(5)
        ]);
    }
}
