<?php

namespace App\Entity;

use App\Repository\VigneronRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VigneronRepository::class)]
class Vigneron
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 5)]
    private ?string $code_postal = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\OneToMany(mappedBy: 'vignerons', targetEntity: Carte::class)]
    private Collection $cartes;

    #[ORM\ManyToOne(inversedBy: 'vigneronsCru')]
    private ?Cru $cru = null;

    #[ORM\ManyToOne(inversedBy: 'vigneronsProd')]
    private ?Produit $produit = null;

    #[ORM\ManyToMany(targetEntity: Partenaire::class, inversedBy: 'vigneronsPart')]
    private Collection $partenaire;

    #[ORM\ManyToMany(targetEntity: Animation::class, inversedBy: 'vigneronsAnim')]
    private Collection $animation;

    #[ORM\Column(length: 255)]
    private ?string $contenuImage = null;

    public function __construct()
    {
        $this->cartes = new ArrayCollection();
        $this->partenaire = new ArrayCollection();
        $this->animation = new ArrayCollection();
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(string $code_postal): self
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getNomPrenom(): ?string
    {
        return $this->nom.' '.$this->prenom;
    }

    /**
     * @return Collection<int, Carte>
     */
    public function getCartes(): Collection
    {
        return $this->cartes;
    }

    public function addCarte(Carte $carte): self
    {
        if (!$this->cartes->contains($carte)) {
            $this->cartes->add($carte);
            $carte->setVignerons($this);
        }

        return $this;
    }

    public function removeCarte(Carte $carte): self
    {
        if ($this->cartes->removeElement($carte)) {
            // set the owning side to null (unless already changed)
            if ($carte->getVignerons() === $this) {
                $carte->setVignerons(null);
            }
        }

        return $this;
    }

    public function getCru(): ?Cru
    {
        return $this->cru;
    }

    public function setCru(?Cru $cru): self
    {
        $this->cru = $cru;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * @return Collection<int, Partenaire>
     */
    public function getPartenaire(): Collection
    {
        return $this->partenaire;
    }

    public function addPartenaire(Partenaire $partenaire): self
    {
        if (!$this->partenaire->contains($partenaire)) {
            $this->partenaire->add($partenaire);
        }

        return $this;
    }

    public function removePartenaire(Partenaire $partenaire): self
    {
        $this->partenaire->removeElement($partenaire);

        return $this;
    }

    /**
     * @return Collection<int, Animation>
     */
    public function getAnimation(): Collection
    {
        return $this->animation;
    }

    public function addAnimation(Animation $animation): self
    {
        if (!$this->animation->contains($animation)) {
            $this->animation->add($animation);
        }

        return $this;
    }

    public function removeAnimation(Animation $animation): self
    {
        $this->animation->removeElement($animation);

        return $this;
    }

    public function getContenuImage(): ?string
    {
        return $this->contenuImage;
    }

    public function setContenuImage(string $contenuImage): self
    {
        $this->contenuImage = $contenuImage;

        return $this;
    }
}
