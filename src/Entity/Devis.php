<?php

namespace App\Entity;

use App\Repository\DevisRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DevisRepository::class)
 */
class Devis implements \JsonSerializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $service1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $service2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $service3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $service4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $service5;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $service6;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(?int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getService1(): ?string
    {
        return $this->service1;
    }

    public function setService1(?string $service1): self
    {
        $this->service1 = $service1;

        return $this;
    }

    public function getService2(): ?string
    {
        return $this->service2;
    }

    public function setService2(?string $service2): self
    {
        $this->service2 = $service2;

        return $this;
    }

    public function getService3(): ?string
    {
        return $this->service3;
    }

    public function setService3(?string $service3): self
    {
        $this->service3 = $service3;

        return $this;
    }

    public function getService4(): ?string
    {
        return $this->service4;
    }

    public function setService4(?string $service4): self
    {
        $this->service4 = $service4;

        return $this;
    }

    public function getService5(): ?string
    {
        return $this->service5;
    }

    public function setService5(?string $service5): self
    {
        $this->service5 = $service5;

        return $this;
    }

    public function getService6(): ?string
    {
        return $this->service6;
    }

    public function setService6(?string $service6): self
    {
        $this->service6 = $service6;

        return $this;
    }
    public function jsonSerialize() {

        return  get_object_vars($this);
    }
}
