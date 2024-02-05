<?php

namespace App\Entity;

use App\Repository\VehicleImageRepository;
use Doctrine\ORM\Mapping as ORM;

use symfony\Component\Validator\constraints as Assert;

#[ORM\Entity(repositoryClass: VehicleImageRepository::class)]
class VehicleImage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $vehicle = null;

    #[ORM\Column(length: 255)]
    private ?string $filename = null;

    #[ORM\Column(length: 255)]
    private ?string $path = null;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?\DateTimeImmutable $uploadeAt = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(string $filename): static
    {
        $this->filename = $filename;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }

    public function getUploadeAt(): ?\DateTimeImmutable
    {
        return $this->uploadeAt;
    }

    public function setUploadeAt(\DateTimeImmutable $uploadeAt): static
    {
        $this->uploadeAt = $uploadeAt;

        return $this;
    }
}
