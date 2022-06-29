<?php

namespace App\Entity;

use App\Repository\InterestRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InterestRepository::class)]
class Interest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'interests')]
    private $user;

    #[ORM\ManyToOne(targetEntity: Project::class, inversedBy: 'interests')]
    private $project;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $likeStatus;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        $this->project = $project;

        return $this;
    }

    public function isLikeStatus(): ?bool
    {
        return $this->likeStatus;
    }

    public function setLikeStatus(?bool $likeStatus): self
    {
        $this->likeStatus = $likeStatus;

        return $this;
    }
}
