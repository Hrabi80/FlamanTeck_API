<?php

namespace App\Entity;

use App\Repository\PortfolioRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PortfolioRepository::class)
 */
class Portfolio implements \JsonSerializable
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $domaine;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $client;

    /**
     * @ORM\Column(type="string", length=2255)
     */
    private $description;

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDomaine(): ?string
    {
        return $this->domaine;
    }

    public function setDomaine(?string $domaine): self
    {
        $this->domaine = $domaine;

        return $this;
    }

    public function getClient(): ?string
    {
        return $this->client;
    }

    public function setClient(?string $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
    * Get photo
    *
    * @return string
    */


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

    public function jsonSerialize() {

        return  get_object_vars($this);
    }
}
