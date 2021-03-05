<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Service;

     /**
     * @Route("/api/services")
     */

class ServiceController extends AbstractController
{

    /**
     * @Route("/all", name="all_services")
     */
    public function getServices(){
        $em = $this->getDoctrine()->getManager();
        $ser = $em->getRepository('App:Service')->findAll();
        return new JsonResponse($ser);
    }
    /**
     * @Route("/serviceByID/{id}" , name="getservice_Info")
     */
    public function getServiceById($id){
        $em = $this->getDoctrine()->getManager();
        $info = $em->getRepository('App:Service')->find($id);
         return new JsonResponse($info);
    }

    /**
     * @Route("/update/{id}" , name="updateMyservice", methods="PUT")
     * @param int $id
     */
    public function updateService(Request $request,$id){
      $data = json_decode($request->getContent(), true);
      $entityManager = $this->getDoctrine()->getManager();
      $info = $entityManager->getRepository(Service::class)->find($id);
      $info->setName($data['name']);
      $info->setDescription($data['description']);
      $info->setIcon($data['icon']);
      $entityManager->flush();
      return new JsonResponse(array('success' => true));
    }


      /*
     * @Route("/getLocs", name="all_locs")
     *
    public function getLocs(){

         $loc = new Localisation();

        $arrayCollection = array();
        foreach($loc as $item) {
        $arrayCollection[] = array(

         'id' => $item->getId(),
         'city' => $item->getCity(),
         'gov'=> $item->getGover(),
         );
        }
        return $this->json($arrayCollection);
    }*/

}
