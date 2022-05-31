<?php

namespace App\Entity;

use App\Repository\VilleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VilleRepository::class)]
class Ville
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'integer')]
    private $codePostal;

    #[ORM\OneToMany(mappedBy: 'villeLieux', targetEntity: Lieu::class)]
    private $listeLieuxVille;

    public function __construct()
    {
        $this->listeLieuxVille = new ArrayCollection();
    }

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

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(int $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * @return Collection<int, Lieu>
     */
    public function getListeLieuxVille(): Collection
    {
        return $this->listeLieuxVille;
    }

    public function addListeLieuxVille(Lieu $listeLieuxVille): self
    {
        if (!$this->listeLieuxVille->contains($listeLieuxVille)) {
            $this->listeLieuxVille[] = $listeLieuxVille;
            $listeLieuxVille->setVilleLieux($this);
        }

        return $this;
    }

    public function removeListeLieuxVille(Lieu $listeLieuxVille): self
    {
        if ($this->listeLieuxVille->removeElement($listeLieuxVille)) {
            // set the owning side to null (unless already changed)
            if ($listeLieuxVille->getVilleLieux() === $this) {
                $listeLieuxVille->setVilleLieux(null);
            }
        }

        return $this;
    }
}
