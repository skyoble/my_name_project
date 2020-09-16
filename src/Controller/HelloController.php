<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelloController extends AbstractController
{
    /** 
    *@Route("/hello/world")
    */
    public function hello(): Response
    {
        $date = date("d/m/y h:i:s");
        return $this->render('hello/index.html.twig', [
            'date' => $date,
        ]);
    }
}