<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints\DateTime;
use App\Entity\Devis;
use App\Entity\Service;
use App\Entity\Newsletter;
use App\Entity\Contact;



 /**
 * @Route("/public")
 */
class ClientController extends AbstractController
{

  /**
   * @Route("/services/all", name="all_services_clientSide")
   */
  public function getServicesInPublic(){
      $em = $this->getDoctrine()->getManager();
      $ser = $em->getRepository('App:Service')->findAll();
      return new JsonResponse($ser);
  }

  /**
  * @Route("/newsletter/add", name="add_newsletter323")
  */
 public function AddNewsletter(Request $request)
 {
     $data = json_decode($request->getContent(), true);
     $loc = new Newsletter();
     $loc->setUserMail($data['mail']);
     $objDateTime = date('d-m-y h:i:s');
     $date=serialize($objDateTime);
     $loc->setDate($date);
     $em = $this->getDoctrine()->getManager();
     $em->persist($loc);
     $em->flush();

     return new JsonResponse(array('success' => true));
 }

 /**
 * @Route("/contact/add")
 */
public function AddMessage(Request $request)
{
    $data = json_decode($request->getContent(), true);
    $loc = new Contact();
    $loc->setEmail($data['mail']);
    $loc->setName($data['name']);
    $loc->setMessage($data['message']);
    $objDateTime = date('d-m-y h:i:s');
    $date=serialize($objDateTime);
    $loc->setDate($date);
    $em = $this->getDoctrine()->getManager();
    $em->persist($loc);
    $em->flush();

    return new JsonResponse(array('success' => true));
}

 /**
 * @Route("/devis/add", name="add_devis43")
 */
public function AddDevis(Request $request)
{
    $data = json_decode($request->getContent(), true);
    $devi = new Devis();
    $devi->setName($request->get('name'));
    $devi->setEmail($request->get('mail'));
    $tel = intval($request->get('tel'));
    $devi->setTel($tel);
    $objDateTime = date('d-m-y h:i:s');
    $date=serialize($objDateTime);
    $devi->setService2($date);
    $devi->setService1($request->get('services'));
    $em = $this->getDoctrine()->getManager();
    $em->persist($devi);
    $em->flush();

    return new JsonResponse(array('success' => true));
}

/**
 * @Route("/realisation/all", name="aldata_realisationssfor_cleint")
 */

public function getAllPortfoliosClientSide(){

    $em = $this->getDoctrine()->getManager();
    $loc = $em->getRepository('App:Portfolio')->findAll();
    return new JsonResponse($loc);
}

/**
 * @Route("/realisationById/{id}" , name="getHouseVInfsdqdqsfgafadqdqo")
 */
public function getPortfolioById($id){
    $em = $this->getDoctrine()->getManager();
    $info = $em->getRepository('App:Portfolio')->find($id);
     return new JsonResponse($info);
}


}
