<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\NumericFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;
use App\Repository\HomeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HomeRepository::class)]
#[ApiResource(
    attributes: [
        'pagination_items_per_page' => 10,
    ]
)]
#[ApiFilter(BooleanFilter::class, properties: ['isVerified'])]
#[ApiFilter(SearchFilter::class, properties: ['name' => 'partial'])]
#[ApiFilter(NumericFilter::class, properties: ['sqft', 'baths', 'stories', 'bedrooms'])]
#[ApiFilter(RangeFilter::class, properties: ['cost'])]
#[ApiFilter(PropertyFilter::class)]
class Home
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $code;

    #[ORM\Column(type: 'boolean')]
    private $isVerified;

    #[ORM\Column(type: 'integer')]
    private $sqft;

    #[ORM\Column(type: 'integer')]
    private $bedrooms;

    #[ORM\Column(type: 'float')]
    private $baths;

    #[ORM\Column(type: 'float')]
    private $stories;

    #[ORM\Column(type: 'integer')]
    private $cost;

    #[ORM\Column(type: 'integer')]
    private $estimatedCost;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $link;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $floorplansLink;

    #[ORM\Column(type: 'text', nullable: true)]
    private $info;

    #[ORM\ManyToOne(targetEntity: HomeStyle::class, inversedBy: 'homes')]
    #[ORM\JoinColumn(nullable: false)]
    private $homeStyle;

    #[ORM\ManyToOne(targetEntity: Partner::class, inversedBy: 'homes')]
    #[ORM\JoinColumn(nullable: false)]
    private $partner;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
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

    public function getIsVerified(): ?bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

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
        return $this->estimatedCost;
    }

    public function setEstimatedCost(int $estimatedCost): self
    {
        $this->estimatedCost = $estimatedCost;

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
        return $this->floorplansLink;
    }

    public function setFloorplansLink(?string $floorplansLink): self
    {
        $this->floorplansLink = $floorplansLink;

        return $this;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function getShortInfo(): ?string
    {
        if (strlen($this->info) < 40) {
            return $this->info;
        }

        return substr($this->info, 0, 40) . '...';
    }

    public function setInfo(?string $info): self
    {
        $this->info = $info;

        return $this;
    }

    public function getHomeStyle(): ?HomeStyle
    {
        return $this->homeStyle;
    }

    public function setHomeStyle(?HomeStyle $homeStyle): self
    {
        $this->homeStyle = $homeStyle;

        return $this;
    }

    public function getPartner(): ?Partner
    {
        return $this->partner;
    }

    public function setPartner(?Partner $partner): self
    {
        $this->partner = $partner;

        return $this;
    }
}
