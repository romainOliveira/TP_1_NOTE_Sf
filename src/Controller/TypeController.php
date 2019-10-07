<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\TypeType;
use App\Entity\Type;

class TypeController extends AbstractController
{
    /**
     * @Route("/type", name="type")
     */
    public function index(Request $query)
    {
        $cat = new Type();

        $form = $this->createForm(TypeType::class, $cat) ;

        $form->handleRequest($query);

        if ($query->isMethod('POST')) {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($cat);
                $em->flush();

                return $this->redirectToRoute('cat', array('id' =>
            $cat->getId()));
            }
        
        }
        return $this->render('type/index.html.twig', array('form' => $form->createView(),));;
    }
}
