<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;
use App\Form\ProductType;

class DetailController extends AbstractController
{
    #[Route('/detail/{id}', name: 'app_detail_show')]
    public function show(Product $product): Response
    {
        return $this->render('detail/index.html.twig', [
            'product' => $product,
        ]);
    }
}
