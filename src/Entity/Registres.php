<?php

namespace App\Entity;

use App\Repository\RegistresRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RegistresRepository::class)
 */
class Registres
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $correu;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $ip;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $data;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $cognom1;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $cognom2;

    /**
     * @ORM\ManyToOne(targetEntity=Oferta::class, inversedBy="registres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $oferta_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCorreu(): ?string
    {
        return $this->correu;
    }

    public function setCorreu(string $correu): self
    {
        $this->correu = $correu;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getData(): ?string
    {
        return $this->data;
    }

    public function setData(string $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCognom1(): ?string
    {
        return $this->cognom1;
    }

    public function setCognom1(string $cognom1): self
    {
        $this->cognom1 = $cognom1;

        return $this;
    }

    public function getCognom2(): ?string
    {
        return $this->cognom2;
    }

    public function setCognom2(string $cognom2): self
    {
        $this->cognom2 = $cognom2;

        return $this;
    }

    public function getOfertaId(): ?Oferta
    {
        return $this->oferta_id;
    }

    public function setOfertaId(?Oferta $oferta_id): self
    {
        $this->oferta_id = $oferta_id;

        return $this;
    }
}
