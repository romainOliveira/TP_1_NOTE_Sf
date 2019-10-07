<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\VisiteType;
use App\Entity\Visite;

class VisiteController extends AbstractController
{
    /**
     * @Route("/visite", name="visite")
     */
    public function index(Request $query)
    {
        $visite = new Visite();

        $form = $this->createForm(VisiteType::class, $visite) ;

        $form->handleRequest($query);

        if ($query->isMethod('POST')) {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($visite);
                $em->flush();

                return $this->redirectToRoute('visite', array('id' =>
            $visite->getId()));
            }
        
        }
        return $this->render('visite/index.html.twig', array('form' => $form->createView(),));;
         
    }
}
