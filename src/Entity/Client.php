<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use App\Entity\User as Admin;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client extends Admin implements \JsonSerializable
{


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lien_util;

    /**
     * @Assert\File(
     *     maxSize = "600000000000",
     *     mimeTypes = {"application/jpg", "application/jpeg","application/png"},
     *     mimeTypesMessage = "Please upload a valid photo"
     * )
     * @ORM\column(name="photo",type="string", length=255)
     */

   private $photo;

   /**
    * @ORM\Column(type="string", length=255, nullable=true)
    */
   private $tel;

    public function getId(): ?int
    {
        return $this->id;
    }


        /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Gets the last login time.
     *
     * @return \DateTime|null
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

        /**
     * Set mail
     *
     * @param string $mail
     *
     * @return User
     */
    public function setMail($email)
    {

        $this->email = $email;


        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {

        return $this->email;

    }


    /*
    * Sets file.
    *
    * @param UploadedFile $photo
    */

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }


        public function jsonSerialize() {

        return  get_object_vars($this);
    }

        public function getLienUtil(): ?string
        {
            return $this->lien_util;
        }

        public function setLienUtil(?string $lien_util): self
        {
            $this->lien_util = $lien_util;

            return $this;
        }

        public function getTel(): ?string
        {
            return $this->tel;
        }

        public function setTel(?string $tel): self
        {
            $this->tel = $tel;

            return $this;
        }
}
