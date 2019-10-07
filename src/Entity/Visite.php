<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VisiteRepository")
 */
class Visite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bien")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_bien;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Visiteur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_visiteur;
    
    /**
     * @ORM\Column(type="date")
     */
    private $id_date;
    
    /**
     * @ORM\Column(type="string", length=30)
     */
    private $suivi;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdBien(): ?Bien
    {
        return $this->id_bien;
    }

    public function setIdBien(?Bien $id_bien): self
    {
        $this->id_bien = $id_bien;

        return $this;
    }

    public function getIdVisiteur(): ?Visiteur
    {
        return $this->id_visiteur;
    }

    public function setIdVisiteur(?Visiteur $id_visiteur): self
    {
        $this->id_visiteur = $id_visiteur;

        return $this;
    }
    
    public function getIdDate(): ?date
    {
        return $this->id_date;
    }

    public function setIdDate(date $date): self
    {
        $this->date = $date;

        return $this;
    }
    
    public function getSuivi(): ?string
    {
        return $this->suivi;
    }

    public function setNom(string $suivi): self
    {
        $this->suivi = $suivi;

        return $this;
    }
}
