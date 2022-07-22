<?php

namespace App\Entity;

use App\Repository\CircleRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: CircleRepository::class)]

class Circle {

    CONST PI = 3.1415926535898;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $radius = null;

    #[ORM\Column]
    private ?float $surface = null;

    #[ORM\Column]
    private ?float $circumference = null;

    #[ORM\Column(length: 255)]
    private ?string $type = "circle";

    public function getId(): ?int {

        return $this->id;
    }

    public function getRadius(): ?float {

        return $this->radius;
    }

    public function setRadius(float $radius): self {

        $this->radius = $radius;

        return $this;
    }

    public function getSurface(): ?float {

        return $this->surface;
    }

    public function setSurface(float $surface): self {

        $this->surface = $surface;

        return $this;
    }

    public function getCircumference(): ?float {

        return $this->circumference;
    }

    public function setCircumference(float $circumference): self {

        $this->circumference = $circumference;

        return $this;
    }

    public function getType(): ?string {

        return $this->type;
    }

    public function setType(string $type): self {

        $this->type = $type;

        return $this;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void {

        $this->id = $id;
    }

}
