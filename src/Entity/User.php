<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User extends BaseUser implements \JsonSerializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */

    protected $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lien;

    /**
     * @Assert\File(
     *     maxSize = "600000000000",
     *     mimeTypes = {"application/jpg", "application/jpeg","application/png"},
     *     mimeTypesMessage = "Please upload a valid photo"
     * )
     * @ORM\column(name="photo",type="string", length=255)
     */

   private $photo;

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
    public function getPhoto(): ?string
    {
        return $this->photo;
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




        public function getTel(): ?string
        {
            return $this->tel;
        }

        public function setTel(?string $tel): self
        {
            $this->tel = $tel;

            return $this;
        }

        public function getLien(): ?string
        {
            return $this->lien;
        }

        public function setLien(?string $lien): self
        {
            $this->lien = $lien;

            return $this;
        }

        public function jsonSerialize() {

        return  get_object_vars($this);
    }
}
