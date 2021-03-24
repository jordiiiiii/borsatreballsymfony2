<?php

namespace App\Entity;

use App\Repository\OfertaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OfertaRepository::class)
 */
class Oferta
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $titol;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $descripcio;

    /**
     * @ORM\Column(type="date")
     */
    private $dataPublicacio;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $ubicacio;

    /**
     * @ORM\Column(type="smallint")
     */
    private $estat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitol(): ?string
    {
        return $this->titol;
    }

    public function setTitol(string $titol): self
    {
        $this->titol = $titol;

        return $this;
    }

    public function getDescripcio(): ?string
    {
        return $this->descripcio;
    }

    public function setDescripcio(string $descripcio): self
    {
        $this->descripcio = $descripcio;

        return $this;
    }

    public function getDataPublicacio(): ?\DateTimeInterface
    {
        return $this->dataPublicacio;
    }

    public function setDataPublicacio(\DateTimeInterface $dataPublicacio): self
    {
        $this->dataPublicacio = $dataPublicacio;

        return $this;
    }

    public function getUbicacio(): ?string
    {
        return $this->ubicacio;
    }

    public function setUbicacio(string $ubicacio): self
    {
        $this->ubicacio = $ubicacio;

        return $this;
    }

    public function getEstat(): ?int
    {
        return $this->estat;
    }

    public function setEstat(int $estat): self
    {
        $this->estat = $estat;

        return $this;
    }
}
