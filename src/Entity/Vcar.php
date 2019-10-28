<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VcarRepository")
 */
class Vcar
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Parking;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Garage;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $Cave;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $Ascenceur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Etage;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $Gardienne;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ToBuy", inversedBy="Vcaract", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $ID_house;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParking(): ?bool
    {
        return $this->Parking;
    }

    public function setParking(bool $Parking): self
    {
        $this->Parking = $Parking;

        return $this;
    }

    public function getGarage(): ?bool
    {
        return $this->Garage;
    }

    public function setGarage(bool $Garage): self
    {
        $this->Garage = $Garage;

        return $this;
    }

    public function getCave(): ?bool
    {
        return $this->Cave;
    }

    public function setCave(?bool $Cave): self
    {
        $this->Cave = $Cave;

        return $this;
    }

    public function getAscenceur(): ?bool
    {
        return $this->Ascenceur;
    }

    public function setAscenceur(?bool $Ascenceur): self
    {
        $this->Ascenceur = $Ascenceur;

        return $this;
    }

    public function getEtage(): ?string
    {
        return $this->Etage;
    }

    public function setEtage(string $Etage): self
    {
        $this->Etage = $Etage;

        return $this;
    }

    public function getGardienne(): ?bool
    {
        return $this->Gardienne;
    }

    public function setGardienne(?bool $Gardienne): self
    {
        $this->Gardienne = $Gardienne;

        return $this;
    }

    public function getIDHouse(): ?ToBuy
    {
        return $this->ID_house;
    }

    public function setIDHouse(ToBuy $ID_house): self
    {
        $this->ID_house = $ID_house;

        return $this;
    }
}