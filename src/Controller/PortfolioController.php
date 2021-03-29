<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Portfolio;


   /**
   * @Route("/api/realisation")
   */
class PortfolioController extends AbstractController
{


     /**
     * @Route("/add", name="add_a_portfolio")
     */
    public function AddPortfolio(Request $request)
    {
         $data = json_decode($request->getContent(), true);
         $uploadedImage=$request->files->get('photo');
          //  $uploadedImage=upload();
               /**
                 * @var UploadedFile $image
                */
            $image=$uploadedImage;
            $imageName=md5(uniqid()).'.'.$image->guessExtension();
            $image->move($this->getParameter('avatar_dir'),$imageName);
        $nvH = new Portfolio();
        $nvH->setPhoto($imageName);
        $nvH->setDescription($request->get('description'));
        $nvH->setTitle($request->get('title'));
        $nvH->setType($request->get('type'));
        $nvH->setClient($request->get('client'));
        $nvH->setDomaine($request->get('domaine'));
        $em = $this->getDoctrine()->getManager();
        $em->persist($nvH);
        $em->flush();

        return new JsonResponse(array('success' => true));
    }

    /**
     * @Route("/all", name="aldata_realisationss")
     */

    public function getAllPortfolio(){

        $em = $this->getDoctrine()->getManager();
        $loc = $em->getRepository('App:Portfolio')->findAll();
        return new JsonResponse($loc);
    }

    /**
     * @Route("/realisationById/{id}")
     */
    public function getPortfolioById($id){
        $em = $this->getDoctrine()->getManager();
        $info = $em->getRepository('App:Portfolio')->find($id);
         return new JsonResponse($info);
    }

    /**
     * @Route("/update/{id}" , methods="PUT")
     * @param int $id
     */
    public function updatePortfolio(Request $request,$id){
      $data = json_decode($request->getContent(), true);
      $entityManager = $this->getDoctrine()->getManager();
      $info = $entityManager->getRepository(Portfolio::class)->find($id);
      $info->setTitle($data['title']);
      $info->setType($data['type']);
      $info->setDomaine($data['domaine']);
      $info->setClient($data['client']);
      $info->setDescription($data['description']);
      $entityManager->flush();
      return new JsonResponse(array('success' => true));
    }

    /**
     * @Route("/delete/{id}")
     */
    public function deleteRealisation($id){
        $em = $this->getDoctrine()->getManager();
        $devis = $em->getRepository('App:Portfolio')->find($id);
        $em->remove($devis);
        $em->flush();
        return new JsonResponse(array('success' => true));
    }



}
