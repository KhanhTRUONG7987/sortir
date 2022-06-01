<?php

namespace App\Entity;

use App\Repository\CampusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CampusRepository::class)]
class Campus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\OneToMany(mappedBy: 'estRattache', targetEntity: User::class)]
    private $listParticipants;

    #[ORM\OneToMany(mappedBy: 'siteOrganisateur', targetEntity: Sortie::class)]
    private $siteOrganisateur;

    public function __construct()
    {

        $this->listParticipants = new ArrayCollection();
        $this->siteOrganisateur = new ArrayCollection();
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





    /**
     * @return Collection<int, Participant>
     */
    public function getListParticipants(): Collection
    {
        return $this->listParticipants;
    }

    public function addListParticipant(Participant $listParticipant): self
    {
        if (!$this->listParticipants->contains($listParticipant)) {
            $this->listParticipants[] = $listParticipant;
            $listParticipant->setEstRattache($this);
        }

        return $this;
    }

    public function removeListParticipant(Participant $listParticipant): self
    {
        if ($this->listParticipants->removeElement($listParticipant)) {
            // set the owning side to null (unless already changed)
            if ($listParticipant->getEstRattache() === $this) {
                $listParticipant->setEstRattache(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Sortie>
     */
    public function getSiteOrganisateur(): Collection
    {
        return $this->siteOrganisateur;
    }

    public function addSiteOrganisateur(Sortie $siteOrganisateur): self
    {
        if (!$this->siteOrganisateur->contains($siteOrganisateur)) {
            $this->siteOrganisateur[] = $siteOrganisateur;
            $siteOrganisateur->setSiteOrganisateur($this);
        }

        return $this;
    }

    public function removeSiteOrganisateur(Sortie $siteOrganisateur): self
    {
        if ($this->siteOrganisateur->removeElement($siteOrganisateur)) {
            // set the owning side to null (unless already changed)
            if ($siteOrganisateur->getSiteOrganisateur() === $this) {
                $siteOrganisateur->setSiteOrganisateur(null);
            }
        }

        return $this;
    }
}
