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
    private ?string $fileName = null;

    #[ORM\Column]
    private array $dataArray = [];

    #[ORM\Column(length: 255)]
    private ?string $langue_ob = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(string $fileName): static
    {
        $this->fileName = $fileName;

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
