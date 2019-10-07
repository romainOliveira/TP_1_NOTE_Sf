<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\VisiteurType;
use App\Entity\Visiteur;

class VisiteurController extends AbstractController
{
    /**
     * @Route("/visiteur", name="visiteur")
     */
    public function index(Request $query)
    {
        $visiteur = new Visiteur();

        $form = $this->createForm(VisiteurType::class, $visiteur) ;

        $form->handleRequest($query);

        if ($query->isMethod('POST')) {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($visiteur);
                $em->flush();

                return $this->redirectToRoute('visiteur', array('id' =>
            $visiteur->getId()));
            }
        
        }
        return $this->render('visiteur/index.html.twig', array('form' => $form->createView(),));;
         
    }
}
