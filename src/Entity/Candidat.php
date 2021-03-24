<?php

namespace App\Entity;

use App\Repository\CandidatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CandidatRepository::class)
 */
class Candidat
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telefon;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTelefon(): ?int
    {
        return $this->telefon;
    }

    public function setTelefon(?int $telefon): self
    {
        $this->telefon = $telefon;

        return $this;
    }
}
