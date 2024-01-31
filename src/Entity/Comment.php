<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentRepository::class)]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $user = null;

    #[ORM\Column(length: 50)]
    private ?string $vehicle = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $commentDate = null;

    #[ORM\Column(length: 255)]
    private ?string $content = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(string $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getVehicle(): ?string
    {
        return $this->vehicle;
    }

    public function setVehicle(string $vehicle): static
    {
        $this->vehicle = $vehicle;

        return $this;
    }

    public function getCommentDate(): ?\DateTimeImmutable
    {
        return $this->commentDate;
    }

    public function setCommentDate(\DateTimeImmutable $commentDate): static
    {
        $this->commentDate = $commentDate;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }
}
