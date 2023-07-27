<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;
use App\Entity\Product;

class ProductuserController extends AbstractController
{
    #[Route('/user1', name: 'app_productuser')]
    public function index(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll(); // Lấy tất cả sản phẩm từ repository

        return $this->render('productuser/index.html.twig', [
            'products' => $products,
        ]);
    }
}
