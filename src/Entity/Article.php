<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\NameableTrait;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    use NameableTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $prixAchat = null;

    #[ORM\Column(nullable: true)]
    private ?int $volume = null;

    #[ORM\Column(nullable: true)]
    private ?float $titrage = null;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Marque $marques = null;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    private ?Couleur $couleurs = null;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    private ?Typebiere $types = null;

    /**
     * @var Collection<int, Vente>
     */
    #[ORM\OneToMany(targetEntity: Vente::class, mappedBy: 'article')]
    private Collection $ventes;

    public function __construct()
    {
        $this->ventes = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->getName() ?? '';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrixAchat(): ?float
    {
        return $this->prixAchat;
    }

    public function setPrixAchat(float $prixAchat): static
    {
        $this->prixAchat = $prixAchat;

        return $this;
    }

    public function getVolume(): ?int
    {
        return $this->volume;
    }

    public function setVolume(?int $volume): static
    {
        $this->volume = $volume;

        return $this;
    }

    public function getTitrage(): ?float
    {
        return $this->titrage;
    }

    public function setTitrage(?float $titrage): static
    {
        $this->titrage = $titrage;

        return $this;
    }

    public function getMarques(): ?Marque
    {
        return $this->marques;
    }

    public function setMarques(?Marque $marques): static
    {
        $this->marques = $marques;

        return $this;
    }

    public function getCouleurs(): ?Couleur
    {
        return $this->couleurs;
    }

    public function setCouleurs(?Couleur $couleurs): static
    {
        $this->couleurs = $couleurs;

        return $this;
    }

    public function getTypes(): ?Typebiere
    {
        return $this->types;
    }

    public function setTypes(?Typebiere $types): static
    {
        $this->types = $types;

        return $this;
    }

    /**
     * @return Collection<int, Vente>
     */
    public function getVentes(): Collection
    {
        return $this->ventes;
    }

    public function addVente(Vente $vente): static
    {
        if (!$this->ventes->contains($vente)) {
            $this->ventes->add($vente);
            $vente->setArticle($this);
        }

        return $this;
    }

    public function removeVente(Vente $vente): static
    {
        if ($this->ventes->removeElement($vente)) {
            // set the owning side to null (unless already changed)
            if ($vente->getArticle() === $this) {
                $vente->setArticle(null);
            }
        }

        return $this;
    }
}
