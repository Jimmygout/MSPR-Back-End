<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EvenementRepository")
 * @ApiResource(
 *   collectionOperations={"get"={"method"="GET"}},
 *   itemOperations={"get"={"method"="GET"}},
 *   normalizationContext = {
 *          "groups" = {"event"}
 *     }
 * )
 * @Vich\Uploadable() 
 */
class Evenement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"event"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"event"})
     */
    private $titre;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var \DateTime
     * @Groups({ "event"})
     */
    private $image;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({ "event"})
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({ "event"})
     */
    private $dateFin;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     * @Groups({"event"})
     */
    private $lieu;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"event"})
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"event"})
     */
    private $information;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"event"})
     */
    private $publier;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"event"})
     */
    private $Latitude;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"event"})
     */
    private $Longitude;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"event"})
     */
    private $AccesHand;

    /**
     * @Vich\UploadableField(mapping="evenement_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Chanteur", inversedBy="evenements")
     * @Groups({"event"})
     */
    private $chanteur;

    public function __construct()
    {
        $this->chanteur = new ArrayCollection();
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }


    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
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

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getInformation(): ?string
    {
        return $this->information;
    }

    public function setInformation(string $information): self
    {
        $this->information = $information;

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

    public function getLatitude(): ?string
    {
        return $this->Latitude;
    }

    public function setLatitude(string $Latitude): self
    {
        $this->Latitude = $Latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->Longitude;
    }

    public function setLongitude(string $Longitude): self
    {
        $this->Longitude = $Longitude;

        return $this;
    }

    public function getAccesHand(): ?bool
    {
        return $this->AccesHand;
    }

    public function setAccesHand(bool $AccesHand): self
    {
        $this->AccesHand = $AccesHand;

        return $this;
    }
    public function __toString(): string
    {
        return $this->titre;
    }

    /**
     * @return Collection|Chanteur[]
     */
    public function getChanteur(): Collection
    {
        return $this->chanteur;
    }

    public function addChanteur(Chanteur $chanteur): self
    {
        if (!$this->chanteur->contains($chanteur)) {
            $this->chanteur[] = $chanteur;
        }

        return $this;
    }

    public function removeChanteur(Chanteur $chanteur): self
    {
        if ($this->chanteur->contains($chanteur)) {
            $this->chanteur->removeElement($chanteur);
        }

        return $this;
    }
}
