<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            // If the user has the 'ROLE_ADMIN' role, render the error page
            return $this->render('admin/index.html.twig', [
                'controller_name' => 'AdminController',
            ]);
        } else {
            // If not, redirect to the home page
            return $this->redirectToRoute('app_error');
        }

    }
}
