<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NewsletterRepository")
 */
class Newsletter implements \JsonSerializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $UserMail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserMail(): ?string
    {
        return $this->UserMail;
    }

    public function setUserMail(string $UserMail): self
    {
        $this->UserMail = $UserMail;

        return $this;
    }



    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(?string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function jsonSerialize() {

        return  get_object_vars($this);
    }
}
