<?php

namespace App\Entity;

use App\Repository\HomeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HomeRepository::class)]
class Home
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $code;

    #[ORM\Column(type: 'boolean')]
    private $verified;

    #[ORM\Column(type: 'integer')]
    private $sqft;

    #[ORM\Column(type: 'integer')]
    private $bedrooms;

    #[ORM\Column(type: 'integer')]
    private $baths;

    #[ORM\Column(type: 'float')]
    private $stories;

    #[ORM\Column(type: 'integer')]
    private $cost;

    #[ORM\Column(type: 'integer')]
    private $estimated_cost;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $link;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $floorplans_link;

    #[ORM\Column(type: 'text', nullable: true)]
    private $info;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getVerified(): ?bool
    {
        return $this->verified;
    }

    public function setVerified(bool $verified): self
    {
        $this->verified = $verified;

        return $this;
    }

    public function getSqft(): ?int
    {
        return $this->sqft;
    }

    public function setSqft(int $sqft): self
    {
        $this->sqft = $sqft;

        return $this;
    }

    public function getBedrooms(): ?int
    {
        return $this->bedrooms;
    }

    public function setBedrooms(int $bedrooms): self
    {
        $this->bedrooms = $bedrooms;

        return $this;
    }

    public function getBaths(): ?int
    {
        return $this->baths;
    }

    public function setBaths(int $baths): self
    {
        $this->baths = $baths;

        return $this;
    }

    public function getStories(): ?float
    {
        return $this->stories;
    }

    public function setStories(float $stories): self
    {
        $this->stories = $stories;

        return $this;
    }

    public function getCost(): ?int
    {
        return $this->cost;
    }

    public function setCost(int $cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    public function getEstimatedCost(): ?int
    {
        return $this->estimated_cost;
    }

    public function setEstimatedCost(int $estimated_cost): self
    {
        $this->estimated_cost = $estimated_cost;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getFloorplansLink(): ?string
    {
        return $this->floorplans_link;
    }

    public function setFloorplansLink(?string $floorplans_link): self
    {
        $this->floorplans_link = $floorplans_link;

        return $this;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(?string $info): self
    {
        $this->info = $info;

        return $this;
    }
}
