<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Form\BienType;
use App\Entity\Bien;

class BienController extends AbstractController
{
    /**
     * @Route("/bien", name="bien")
     */
        function creerCategorie(Request $query) 
    {

        $bien = new Bien();

        $form = $this->createForm(BienType::class, $bien) ;

        $form->handleRequest($query);

        if ($query->isMethod('POST')) {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($bien);
                $em->flush();

                return $this->redirectToRoute('bien', array('id' =>
            $bien->getId()));
            }
        
        }
        return $this->render('bien/index.html.twig', array('form' => $form->createView(),));;
         
    }
    
    /**
*
*@Route("/bien/update/{id}",name="upd_route")
*
*/
    public function updateBien(Request $request, Session $session, $id){
        
        $bien = new Bien();
        $bien = $this->getDoctrine()->getManager()->getRepository(Bien::class)->findById($id);
        //$id = $session->get('login');
        $request->getSession()->getFlashBag()->add('notice', '');
        $form = $this->createForm(BienController::class, $bien);
        if($request->isMethod('POST')){
            $form->handleRequest($request);
                if($form->isValid()){
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                    $request->getSession()->getFlashBag()->add('success', 'Bien modifié avec succès.');

                    return $this->redirectToRoute('upd_route',array('id'=>$id));
                }
        }
    return $this->render( 'bien/update.html.twig', array('form' =>$form->createView(), 'bien'=>$bien));
    }
    
        /**
*
*@Route("/bien/consulter",name="cst_route")
*
*/
    public function consulterBien(){
        
        return $this->render('bien/consulter.html.twig');
         
    }
    
}

