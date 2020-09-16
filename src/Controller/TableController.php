<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/table")
 */
class TableController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('table/index.html.twig', [
            'controller_name' => 'TableController',
        ]);
    }
    /**
     * @Route("/print")
     */
    public function print()
    {
        return $this->render('table/print.html.twig', [
            'controller_name' => 'TableController',
        ]);
    }
}
