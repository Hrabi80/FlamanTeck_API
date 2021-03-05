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
     * @Route("/allData", name="alldata")
     */



    /**
     * @Route("/delete/{id}")
     */
     /*
    public function deleteAction($id){
        $em = $this->getDoctrine()->getManager();

        $forRentM = $em->getRepository('App:ToBuy')->find($id);
       // $project.remove
        $em->remove($forRentM);
        $em->flush();

        return new JsonResponse(array('success' => true));
    }
    /**
     * @Route("/getHouseInfo/{id}" , name="getHouseVInfo")
     */
     /*
    public function getHouseVInfo($id){
        $em = $this->getDoctrine()->getManager();
        $info = $em->getRepository('App:ToBuy')->find($id);
         return new JsonResponse($info);
    }

    /**
     * @Route("/updateIMG/{id}" , name="updateHouseimg", methods="PUT")
     * @param int $id
     */
     /*
    public function updateIMG(Request $request, $id){
    //  $data = json_decode($request->files->getContent(), true);

      $uploadedImage=$request->files->get('mainIMG');
      $uploadedImage2=$request->files->get('cover');
      //$uploadedImage2=$data['cover'];

  //    $uploadedImage=upload();
               /**
                 * @var UploadedFile $image
                */
                /*
            $image=$uploadedImage;
            $cover = $uploadedImage2;
            $imageName=md5(uniqid()).'.'.$image->guessExtension();
            $image->move($this->getParameter('avatar_dir'),$imageName);
            $imagename2=md5(uniqid()).'.'.$cover->guessExtension();
            $cover->move($this->getParameter('avatar_dir'),$imagename2);
      $entityManager = $this->getDoctrine()->getManager();
      $info = $entityManager->getRepository(ToBuy::class)->find($id);
      $info->setMainIMG($imageName);
      $info->setCover($imagename2);

      $entityManager->flush();
      return new JsonResponse(array('success' => true));
    }
    /**
     * @Route("/updateHouseInfo/{id}" , name="updateHouseInfo", methods="PUT")
     * @param int $id
     */


     /*
    public function updateHouseInfo(Request $request, $id){
      $data = json_decode($request->getContent(), true);
      $entityManager = $this->getDoctrine()->getManager();
      $info = $entityManager->getRepository(ToBuy::class)->find($id);
      $info->setAdress($data['adress']);
      $info->setCity($data['city']);
      $info->setDescription($data['description']);
      $info->setDescription2($data['description2']);
      $info->setDescription3($data['description3']);
      $info->setRoomNB($data['Tx']);
      $pp=$data['Tx'];
      $info->setPiece($pp+1);
      $info->setPrice($data['price']);
      $info->setSurface($data['surface']);
      $entityManager->flush();
      return new JsonResponse(array('success' => true));
    }

    /**
     * @Route("/AddTransport/{id}", name="add_transp")
     */


     /*
    public function addTransport(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $data = json_decode($request->getContent(), true);
        $station= new Transport();
        $toBuy = $em->getRepository('App:ToBuy')->find($id);
        $station->setHouseId($toBuy);
        $station->setBus($data['bus']);
        $station->setBusST($data['busST']);
      //  $station->setLouage($data['louage']);
      //  $station->setLouageST($data['louageST']);
        //$station->setLouageM('taxi');
        $station->setMetro($data['metro']);
        $station->setMetroST($data['metroST']);
      //  $station->setTrain($data['train']);
        //$station->setTrainST($data['trainST']);


        $em->persist($station);
        $em->flush();

        return new JsonResponse(array('success' => true));

    }
    /**
     * @Route("/AddInfo/{id}", name="add_Myinfo")
     */

     /*
    public function addInfo(Request $request,$id){
        $em = $this->getDoctrine()->getManager();
        $data = json_decode($request->getContent(), true);
        $info = new Vcar();
        $toBuy = $em->getRepository('App:ToBuy')->find($id);
        $info->setAscenceur($data['elevator']);
        $info->setCave($data['cave']);
        $info->setEtage($data['etage']);
        $info->setGarage($data['garage']);
        $info->setGardienne($data['garden']);
        $info->setParking($data['parking']);
        $info->setIDHouse($toBuy);
        $em->persist($info);
        $em->flush();

        return new JsonResponse(array('success' => true));
    }

     /**
     * @Route("/AddMap/{id}", name="add_info")
     */

     /*
    public function addMap(Request $request,$id){
        $em = $this->getDoctrine()->getManager();
        $data = json_decode($request->getContent(), true);
        $map = new Map();
        $toBuy = $em->getRepository('App:ToBuy')->find($id);
        $map->setMap($data['map']);
        $map->setVirtualTour($data['virtual']);
        $map->setHouseId($toBuy);
        $em->persist($map);
        $em->flush();

        return new JsonResponse(array('success' => true));
    }*/
}
