<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConcertRepository")
 * @ApiResource(
 *   collectionOperations={"get"={"method"="GET"}},
 *   itemOperations={"get"={"method"="GET"}},
 *   normalizationContext = {
 *          "groups" = { "concert" }
 *     }
 * )
 * @ApiFilter(SearchFilter::class, properties={"chanteur.nom": "partial"})
 */
class Concert
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"chanteur", "concert"})
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"chanteur", "concert"})
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"chanteur", "concert"})
     */
    private $dateFin;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"chanteur", "concert"})
     */
    private $publier;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Scene", inversedBy="concerts")
     * @Groups({"chanteur", "concert"})
     */
    private $scene;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Chanteur", inversedBy="concerts")
     * @Groups({"concert"})
     */
    private $chanteur;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }


    public function getPublier(): ?bool
    {
        return $this->publier;
    }

    public function setPublier(bool $publier): self
    {
        $this->publier = $publier;

        return $this;
    }

    public function getScene(): ?Scene
    {
        return $this->scene;
    }

    public function setScene(?Scene $scene): self
    {
        $this->scene = $scene;

        return $this;
    }

    public function __toString(): string
    {
        return $this->id;
    }

    public function getChanteur(): ?Chanteur
    {
        return $this->chanteur;
    }

    public function setChanteur(?Chanteur $chanteur): self
    {
        $this->chanteur = $chanteur;

        return $this;
    }

}
