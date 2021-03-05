<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Newsletter;

     /**
     * @Route("/api")
     */

class ContactController extends AbstractController
{


    /**
     * @Route("/newsletter/all", name="all_Newsletter22")
     */
    public function getNewsletter(){
        $em = $this->getDoctrine()->getManager();
        $ser = $em->getRepository('App:Newsletter')->findAll();
        return new JsonResponse($ser);
    }

    /**
     * @Route("/newsletter/delete/{id}", name="delete_flase_newsletter")
     */
    public function deleteNewsletter($id){
        $em = $this->getDoctrine()->getManager();
        $devis = $em->getRepository('App:Newsletter')->find($id);
        $em->remove($devis);
        $em->flush();
        return new JsonResponse(array('success' => true));
    }


}
