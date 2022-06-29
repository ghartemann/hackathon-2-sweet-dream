<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $topic;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $agency;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $techno;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $meeting;

    #[ORM\OneToMany(mappedBy: 'project', targetEntity: Interest::class)]
    private $interests;

    public function __construct()
    {
        $this->interests = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getTopic(): ?string
    {
        return $this->topic;
    }

    public function setTopic(?string $topic): self
    {
        $this->topic = $topic;

        return $this;
    }

    public function getAgency(): ?string
    {
        return $this->agency;
    }

    public function setAgency(?string $agency): self
    {
        $this->agency = $agency;

        return $this;
    }

    public function getTechno(): ?string
    {
        return $this->techno;
    }

    public function setTechno(?string $techno): self
    {
        $this->techno = $techno;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getMeeting(): ?string
    {
        return $this->meeting;
    }

    public function setMeeting(?string $meeting): self
    {
        $this->meeting = $meeting;

        return $this;
    }

    /**
     * @return Collection<int, Interest>
     */
    public function getInterests(): Collection
    {
        return $this->interests;
    }

    public function addInterest(Interest $interest): self
    {
        if (!$this->interests->contains($interest)) {
            $this->interests[] = $interest;
            $interest->setProject($this);
        }

        return $this;
    }

    public function removeInterest(Interest $interest): self
    {
        if ($this->interests->removeElement($interest)) {
            // set the owning side to null (unless already changed)
            if ($interest->getProject() === $this) {
                $interest->setProject(null);
            }
        }

        return $this;
    }
}
