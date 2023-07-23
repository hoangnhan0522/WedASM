<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;
use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;




class SearchController extends AbstractController
{
    private $entityManager;

    public function __construct(ManagerRegistry $registry)
    {
        $this->entityManager = $registry->getManager();
    }


    private function getProductsByCategory(string $categoryName): array
    {
        $category = $this->entityManager->getRepository(Category::class)->findOneBy(['name' => $categoryName]);
        if (!$category) {
            return []; // Return an empty array if category not found
        }

        return $this->entityManager->getRepository(Product::class)->findBy(['category' => $category]);
    }



    #[Route('/search', name: 'search')]
    public function search(Request $request, ProductRepository $productRepository): Response
    {
        $keyword = $request->query->get('keyword');

        $products = $productRepository->searchByKeyword($keyword);

        return $this->render('search/index.html.twig', [
            'products' => $products,
            'keyword' => $keyword,
        ]);
    }
#[Route('/laptop', name: 'app_laptop')]
    public function laptopIndex(ProductRepository $productRepository): Response
    {
        $category = $this->entityManager->getRepository(Category::class)->findOneBy(['name' => 'Laptop']);
        $products = $productRepository->findBy(['category' => $category]);

        return $this->render('search/laptop/index.html.twig', [
            'products' => $products,
        ]);
    }


    #[Route('/keyboard', name: 'app_keyboard')]

    public function keyboardindex(ProductRepository $productRepository): Response
    {

        $category = $this->entityManager->getRepository(Category::class)->findOneBy(['name' => 'Keyboard']);
        $products = $productRepository->findBy(['category' => $category]);

        return $this->render('search/keyboard/index.html.twig', [
            'products' => $products,
        ]);
    }
    #[Route('/mouse', name: 'app_mouse')]

    public function mouseindex(ProductRepository $productRepository): Response
    {
        // Lấy danh sách sản phẩm của category "macbook"
        $category = $this->entityManager->getRepository(Category::class)->findOneBy(['name' => 'Mouse']);
        $products = $productRepository->findBy(['category' => $category]);

        return $this->render('search/mouse/index.html.twig', [
            'products' => $products,
        ]);
    }
}
