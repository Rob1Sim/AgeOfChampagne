<?php

namespace App\Entity;

use App\Repository\PartenaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartenaireRepository::class)]
class Partenaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\OneToMany(mappedBy: 'partenaire', targetEntity: Vigneron::class)]
    private Collection $vigneronsPart;

    public function __construct()
    {
        $this->vigneronsPart = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return Collection<int, Vigneron>
     */
    public function getVigneronsPart(): Collection
    {
        return $this->vigneronsPart;
    }

    public function addVigneronsPart(Vigneron $vigneronsPart): self
    {
        if (!$this->vigneronsPart->contains($vigneronsPart)) {
            $this->vigneronsPart->add($vigneronsPart);
            $vigneronsPart->setPartenaire($this);
        }

        return $this;
    }

    public function removeVigneronsPart(Vigneron $vigneronsPart): self
    {
        if ($this->vigneronsPart->removeElement($vigneronsPart)) {
            // set the owning side to null (unless already changed)
            if ($vigneronsPart->getPartenaire() === $this) {
                $vigneronsPart->setPartenaire(null);
            }
        }

        return $this;
    }
}
