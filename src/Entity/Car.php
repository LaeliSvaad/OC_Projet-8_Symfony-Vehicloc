<?php

namespace App\Entity;

use App\Repository\CarRepository;
use App\Enum\MotorType;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column (type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 70)]
    #[Assert\NotBlank(message: "Le nom ne peut être vide.")]
    #[Assert\Length(
        max: 70,
        maxMessage: 'Le nom de la voiture ne doit pas excéder {{ limit }} caractères.',
    )]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: "La description ne peut être vide.")]
    private ?string $description = null;

    #[ORM\Column(type: 'float')]
    #[Assert\Type('float')]
    #[Assert\NotBlank(message: "Le prix mensuel est obligatoire.")]
    #[Assert\Positive(message: "Le prix mensuel doit être positif.")]
    private ?float $monthly_price = null;

    #[ORM\Column(type: 'float')]
    #[Assert\Type('float')]
    #[Assert\NotBlank(message: "Le prix journalier est obligatoire.")]
    #[Assert\Positive(message: "Le prix journalier doit être positif.")]
    private ?float $daily_price = null;

    #[ORM\Column(type: 'integer')]
    #[Assert\Type('integer')]
    #[Assert\NotNull(message: "Le nombre de places est obligatoire.")]
    #[Assert\Range(
        min: 1,
        max: 9,
        notInRangeMessage: 'Le nombre de places doit être compris entre {{ min }} et {{ max }}.',
    )]
    private ?int $places = null;

    #[ORM\Column(enumType: MotorType::class)]
    #[Assert\NotNull(message: "Le type de moteur est obligatoire.")]
    private ?MotorType $motor = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

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

    public function getMonthlyPrice(): ?float
    {
        return $this->monthly_price;
    }

    public function setMonthlyPrice(float $monthly_price): static
    {
        $this->monthly_price = $monthly_price;

        return $this;
    }

    public function getDailyPrice(): ?float
    {
        return $this->daily_price;
    }

    public function setDailyPrice(float $daily_price): static
    {
        $this->daily_price = $daily_price;

        return $this;
    }

    public function getPlaces(): ?int
    {
        return $this->places;
    }

    public function setPlaces(int $places): static
    {
        $this->places = $places;

        return $this;
    }

    public function getMotor(): ?MotorType
    {
        return $this->motor;
    }

    public function setMotor(?MotorType $motor): self
    {
        $this->motor = $motor;
        return $this;
    }
}
