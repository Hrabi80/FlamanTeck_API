<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

/**
* @Route("/api/client")
*/
class UserController extends AbstractController
{
  /**
   * @Route("/all", name="all_clientss")
   */
  public function getClientss(){
      $em = $this->getDoctrine()->getManager();
      $ser = $em->getRepository('App:User')->findAll();
      $arrayCollection = array();
      foreach($ser as $item) {
      $arrayCollection[] = array(
      'id' => $item->getId(),
       'name' => $item->getUsername(),
       'mail'=> $item->getMail(),
       'tel'=> $item->getTel(),
       'lien'=> $item->getLien(),
       'photo'=> $item->getPhoto(),
       'role'=> $item->getRoles(),

       );
      }
       return new JsonResponse($arrayCollection);
  }


  /**
  * @Route("/add", name="add_a_client")
  */
 public function AddClient(Request $request, UserPasswordEncoderInterface $encoder)
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
     $user = new User();
     $user->setPhoto($imageName);
     $user->setMail($request->get('email'));
     $user->setLien($request->get('lien'));
     $user->setTel($request->get('tel'));
     $user->setUsername($request->get('username'));
     $encoded = $encoder->encodePassword($user, $request->get('password'));
     $user->setPassword($encoded);
     $user->setEnabled(true);
     $user->addRole('ROLE_USER');
     $em = $this->getDoctrine()->getManager();
     $em->persist($user);
     $em->flush();

     return new JsonResponse(array('success' => true));
 }


 /**
 * @Route("/add_admin", name="add_an_admin")
 */
public function AddAdmin(Request $request, UserPasswordEncoderInterface $encoder)
{
     $data = json_decode($request->getContent(), true);

    $user = new User();

    $user->setMail($request->get('email'));
    $user->setLienUtil($request->get('lien'));
    $user->setTel($request->get('tel'));
    $user->setUsername($request->get('username'));
    $encoded = $encoder->encodePassword($user, $request->get('password'));
    $user->setPassword($encoded);
    $user->setEnabled(true);
    $user->addRole('ROLE_USER');

    $em = $this->getDoctrine()->getManager();
    $em->persist($user);
    $em->flush();

    return new JsonResponse(array('success' => true));
}

/**
 * @Route("/delete/{id}")
 */
public function deleteClient($id){
    $em = $this->getDoctrine()->getManager();
    $user = $em->getRepository('App:User')->find($id);
    $em->remove($user);
    $em->flush();

    return new JsonResponse(array('success' => true));
}



}
