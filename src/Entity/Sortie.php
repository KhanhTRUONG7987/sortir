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

    #[ORM\Column(type: 'string', length: 255)]
    private $etat;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'participants')]
    private $sorties;

    #[ORM\ManyToOne(targetEntity: Campus::class, inversedBy: 'sortieOrganisee')]
    #[ORM\JoinColumn(nullable: false)]
    private $sortieOrganisee;

    #[ORM\ManyToOne(targetEntity: Lieu::class, inversedBy: 'lieu')]
    #[ORM\JoinColumn(nullable: false)]
    private $lieuxSorties;

    #[ORM\ManyToOne(targetEntity: Etat::class, inversedBy: 'etatDeSortie')]
    #[ORM\JoinColumn(nullable: false)]
    private $etatSorties;



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

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * @return Collection<int, Participant>
     */
    public function getSorties(): Collection
    {
        return $this->sorties;
    }

    public function addSorty(Participant $sorty): self
    {
        if (!$this->sorties->contains($sorty)) {
            $this->sorties[] = $sorty;
            $sorty->addParticipant($this);
        }

        return $this;
    }

    public function removeSorty(Participant $sorty): self
    {
        if ($this->sorties->removeElement($sorty)) {
            $sorty->removeParticipant($this);
        }

        return $this;
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





}
