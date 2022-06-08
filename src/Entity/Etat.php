<?php

namespace App\Entity;

use App\Repository\EtatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtatRepository::class)]
class Etat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $libelle;

    #[ORM\OneToMany(mappedBy: 'etatSorties', targetEntity: Sortie::class)]
    private $etatDeSortie;

    public function __construct()
    {
        $this->etatDeSortie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection<int, Sortie>
     */
    public function getEtatDeSortie(): Collection
    {
        return $this->etatDeSortie;
    }

    public function addEtatDeSortie(Sortie $etatDeSortie): self
    {
        if (!$this->etatDeSortie->contains($etatDeSortie)) {
            $this->etatDeSortie[] = $etatDeSortie;
            $etatDeSortie->setEtatSorties($this);
        }

        return $this;
    }

    public function removeEtatDeSortie(Sortie $etatDeSortie): self
    {
        if ($this->etatDeSortie->removeElement($etatDeSortie)) {
            // set the owning side to null (unless already changed)
            if ($etatDeSortie->getEtatSorties() === $this) {
                $etatDeSortie->setEtatSorties(null);
            }
        }

        return $this;
    }
}