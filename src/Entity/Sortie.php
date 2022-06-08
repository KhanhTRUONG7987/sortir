<?php

namespace App\Entity;

use App\Repository\SortieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SortieRepository::class)]
class Sortie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'datetime')]
    private $dateHeureDebut;

    #[ORM\Column(type: 'integer')]
    private $duree;

    #[ORM\Column(type: 'datetime')]
    private $dateLimiteInscription;

    #[ORM\Column(type: 'integer')]
    private $nbinscriptionsMax;

    #[ORM\Column(type: 'text')]
    private $infosSortie;


    #[ORM\ManyToOne(targetEntity: Campus::class, inversedBy: 'sortieOrganisee')]
    #[ORM\JoinColumn(nullable: false)]
    private $sortieOrganisee;

    #[ORM\ManyToOne(targetEntity: Lieu::class, inversedBy: 'lieu')]
    #[ORM\JoinColumn(nullable: false)]
    private $lieuxSorties;

    #[ORM\ManyToOne(targetEntity: Etat::class, inversedBy: 'etatDeSortie')]
    #[ORM\JoinColumn(nullable: false)]
    private $etatSorties;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'Sortie')]
    #[ORM\JoinColumn(nullable: false)]
    private $organisateur;



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

    public function getDateHeureDebut(): ?\DateTimeInterface
    {
        return $this->dateHeureDebut;
    }

    public function setDateHeureDebut(\DateTimeInterface $dateHeureDebut): self
    {
        $this->dateHeureDebut = $dateHeureDebut;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getDateLimiteInscription(): ?\DateTimeInterface
    {
        return $this->dateLimiteInscription;
    }

    public function setDateLimiteInscription(\DateTimeInterface $dateLimiteInscription): self
    {
        $this->dateLimiteInscription = $dateLimiteInscription;

        return $this;
    }

    public function getNbinscriptionsMax(): ?int
    {
        return $this->nbinscriptionsMax;
    }

    public function setNbinscriptionsMax(int $nbinscriptionsMax): self
    {
        $this->nbinscriptionsMax = $nbinscriptionsMax;

        return $this;
    }

    public function getInfosSortie(): ?string
    {
        return $this->infosSortie;
    }

    public function setInfosSortie(string $infosSortie): self
    {
        $this->infosSortie = $infosSortie;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getSorties(): Collection
    {
        return $this->sorties;
    }

    public function getSortieOrganisee(): ?Campus
    {
        return $this->sortieOrganisee;
    }

    public function setSortieOrganisee(?Campus $sortieOrganisee): self
    {
        $this->sortieOrganisee = $sortieOrganisee;

        return $this;
    }

    public function getLieuxSorties(): ?Lieu
    {
        return $this->lieuxSorties;
    }

    public function setLieuxSorties(?Lieu $lieuxSorties): self
    {
        $this->lieuxSorties = $lieuxSorties;

        return $this;
    }

    public function getEtatSorties(): ?Etat
    {
        return $this->etatSorties;
    }

    public function setEtatSorties(?Etat $etatSorties): self
    {
        $this->etatSorties = $etatSorties;

        return $this;
    }

    public function getOrganisateur(): ?User
    {
        return $this->organisateur;
    }

    public function setOrganisateur(?User $organisateur): self
    {
        $this->organisateur = $organisateur;

        return $this;
    }



}