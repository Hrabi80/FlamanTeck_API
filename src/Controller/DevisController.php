<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Devis;

     /**
     * @Route("/api/devis")
     */

class DevisController extends AbstractController
{


    /**
     * @Route("/all", name="all_Devis2")
     */
    public function getDevis(){
        $em = $this->getDoctrine()->getManager();
        $ser = $em->getRepository('App:Devis')->findAll();
        return new JsonResponse($ser);
    }

    /**
     * @Route("/delete/{id}", name="delete_old_devis")
     */
    public function deleteDevis($id){
        $em = $this->getDoctrine()->getManager();
        $devis = $em->getRepository('App:Devis')->find($id);
        $em->remove($devis);
        $em->flush();
        return new JsonResponse(array('success' => true));
    }


}
