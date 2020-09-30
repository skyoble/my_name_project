<?php

namespace App\Controller;

use App\Form\TableChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
     * @Route("/print" , name="table_number")
     */
    public function print(Request $request)
    {
        dump($request);
        $n = $request->get('n');

        return $this->render('table/print.html.twig', [
            'n' => $n,
        ]);
    }
    /**
     * @Route("/select")
     */
    public function select(Request $request)
    {
        $form = $this->createForm(TableChoiceType::class);
        $form->handleRequest($request);

        if($form->isSubmitted()){
                $data = $form->getData();
                dump('1');
                $ret['n'] = $data['table_number'];
                $response = $this->redirectToRoute('table_number' , $ret );
        } else {
            dump('2');
            $response = $this->render('table/select.html.twig',['nom_formulaire' => $form->createView(),]);
        }
        return $response;
        
    }
}
