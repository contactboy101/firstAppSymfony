<?php

namespace App\Entity;

use App\Repository\BraveChefRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BraveChefRepository::class)]
class BraveChef
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
