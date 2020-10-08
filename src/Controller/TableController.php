<?php

namespace App\Controller;

use App\Entity\Table;
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
        $table_choice = $request->get('table_choice');
        $n = $request->get('n');
        $x = $request->get('x');
        $method = $request->getMethod();
        $table = new Table($n);
        if ($method == 'GET')
        {
            $n = $request->get('n');
            $x = $request->get('x');
        } else {
            $table_choice=$request->get('table_choice');
            $n = $table_choice['table_number'];
            $x = $table_choice['table_number2'];
        }
        if($x ==0)
        {
            $x = 10 ;
        }
        return $this->render('table/print.html.twig', [
            'n' => $n, 
            'x' => $x,
            'method'=> $method ,
            'values'=> $table->calcTable(),
        ]);
    }
    /**
     * @Route("/select")
     */
    public function select(Request $request)
    {
        $form = $this->createForm(TableChoiceType::class);
        $form->handleRequest($request);

        dump($request->getMethod());

        if($form->isSubmitted()){
                $data = $form->getData();
                $ret['n'] = $data['table_number'];
                $ret['x'] = $data['table_number2'];
                $response = $this->redirectToRoute('table_number' , $ret );
        } else {
            $response = $this->render('table/select.html.twig',['nom_formulaire' => $form->createView(),]);
        }
        return $response;
        
    }
    /**
     * @Route("/select2")
     */
    public function select2(Request $request)
    {
        $form = $this->createForm(TableChoiceType::class,null,
        [
            'method' => 'POST' ,
            'action' => '/table/print'
        ]);
        $form->handleRequest($request);

        dump($request->getMethod());

        if($form->isSubmitted()){
                $data = $form->getData();
                $ret['n'] = $data['table_number'];
                $ret['x'] = $data['table_number2'];
                $response = $this->redirectToRoute('table_number' , $ret );
        } else {
            $response = $this->render('table/select.html.twig',['nom_formulaire' => $form->createView(),]);
        }
        return $response;
        
    }
}
