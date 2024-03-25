<?php

namespace App\Entity;

use App\Repository\FileRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FileRepository::class)]
class File
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Title = null;

    #[ORM\Column]
    private array $dataArray = [];

    #[ORM\Column(length: 255)]
    private ?string $langue_ob = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): static
    {
        $this->Title = $Title;

        return $this;
    }

    public function getDataArray(): array
    {
        return $this->dataArray;
    }

    public function setDataArray(array $dataArray): static
    {
        $this->dataArray = $dataArray;

        return $this;
    }

    public function getLangueOb(): ?string
    {
        return $this->langue_ob;
    }

    public function setLangueOb(string $langue_ob): static
    {
        $this->langue_ob = $langue_ob;

        return $this;
    }
}
