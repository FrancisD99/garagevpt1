<?php

namespace App\Entity;

use App\Repository\VehicleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass:VehicleRepository::class)]
class Vehicle
{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: "vehicles")]
#[ORM\JoinColumn(nullable: false)]
private User $user;


public function getUser(): User
{
    return $this->user;
}

public function setUser(User $user): self
{
    $this->user = $user;

    return $this;
}

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 5, max: 50)]
    
    private ?string $make = null;

    
    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 5, max: 50)]
    
    private ?string $Model = null;

    
    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 5, max: 50)]
    
    private ?string $mileage = null;

    
    #[ORM\Column(length: 50, nullable: true)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 5, max: 50)]
    
    private ?string $modelvehicle = null;

    
    #[ORM\Column(length: 10)]
    #[Assert\Length(min: 4, max: 10)]
    
    private ?string $year = null;

    
    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\Positive()]
    #[Assert\LessThan(200)]
    
    private ?float $price = null;

    
    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(min: 4, max: 255)]
    
    private ?string $description = null;

    
    #[ORM\Column(type:'boolean', nullable:true)]
    
    private ?bool $isAvailable = null;


    public function getmileage(): ?string
    {
        return $this->mileage;
    }

    public function setmileage(string $mileage): static
    {
        $this->mileage = $mileage;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(string $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getMake(): ?string
{
    return $this->make;
}

    public function setMake(string $make): static
{
    $this->make = $make;
    return $this;
}

public function getModel(): ?string
{
    return $this->Model;
}

    public function setModel(string $Model): static
{
    $this->Model = $Model;
    return $this;
}

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function isIsAvailable(): ?bool
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(bool $isAvailable): static
    {
        $this->isAvailable = $isAvailable;

        return $this;
    }
}
