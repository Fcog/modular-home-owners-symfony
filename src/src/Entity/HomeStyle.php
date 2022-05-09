<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\HomeStyleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HomeStyleRepository::class)]
#[ApiResource()]
class HomeStyle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\OneToMany(mappedBy: 'homeStyle', targetEntity: Home::class)]
    private $homes;

    public function __construct()
    {
        $this->homes = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Home>
     */
    public function getHomes(): Collection
    {
        return $this->homes;
    }

    public function addHome(Home $home): self
    {
        if (!$this->homes->contains($home)) {
            $this->homes[] = $home;
            $home->setHomeStyle($this);
        }

        return $this;
    }

    public function removeHome(Home $home): self
    {
        if ($this->homes->removeElement($home)) {
            // set the owning side to null (unless already changed)
            if ($home->getHomeStyle() === $this) {
                $home->setHomeStyle(null);
            }
        }

        return $this;
    }
}
