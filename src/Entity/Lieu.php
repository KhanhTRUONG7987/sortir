<?php

namespace App\Entity;

use App\Repository\LieuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LieuRepository::class)]
class Lieu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'string', length: 255)]
    private $rue;

    #[ORM\Column(type: 'float', nullable: true)]
    private $latitude;

    #[ORM\Column(type: 'float', nullable: true)]
    private $longitude;

    #[ORM\OneToMany(mappedBy: 'lieuxSorties', targetEntity: Sortie::class)]
    private $lieu;

    #[ORM\ManyToOne(targetEntity: Ville::class, inversedBy: 'listeLieuxVille')]
    #[ORM\JoinColumn(nullable: false)]
    private $villeLieux;

    public function __construct()
    {
        $this->lieu = new ArrayCollection();
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

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(?float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(?string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * @return Collection<int, Sortie>
     */
    public function getLieu(): Collection
    {
        return $this->lieux;
    }

    public function addLieu(Sortie $lieu): self
    {
        if (!$this->lieu->contains($lieu)) {
            $this->lieu[] = $lieu;
            $lieu->setLieuxSorties($this);
        }

        return $this;
    }

    public function removeLieu(Sortie $lieu): self
    {
        if ($this->lieu->removeElement($lieu)) {
            // set the owning side to null (unless already changed)
            if ($lieu->getLieuxSorties() === $this) {
                $lieu->setLieuxSorties(null);
            }
        }

        return $this;
    }

    public function getVilleLieux(): ?Ville
    {
        return $this->villeLieux;
    }

    public function setVilleLieux(?Ville $villeLieux): self
    {
        $this->villeLieux = $villeLieux;

        return $this;
    }
}