<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ShopTiresRepository")
 */
class ShopTires
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $brand;

    /**
     * @ORM\Column(type="integer")
     */
    private $width;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rimDiameter;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tractionRating;

    /**
     * @ORM\Column(type="integer")
     */
    private $tireProfile;

    /**
     * @ORM\Column(type="string", length=2, nullable=true)
     */
    private $temperatureRating;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $threadRating;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $currentThread;

    /**
     * @ORM\Column(type="decimal", precision=7, scale=2)
     */
    private $price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getRimDiameter(): ?string
    {
        return $this->rimDiameter;
    }

    public function setRimDiameter(string $rimDiameter): self
    {
        $this->rimDiameter = $rimDiameter;

        return $this;
    }

    public function getTractionRating(): ?string
    {
        return $this->tractionRating;
    }

    public function setTractionRating(?string $tractionRating): self
    {
        $this->tractionRating = $tractionRating;

        return $this;
    }

    public function getTireProfile(): ?int
    {
        return $this->tireProfile;
    }

    public function setTireProfile(int $tireProfile): self
    {
        $this->tireProfile = $tireProfile;

        return $this;
    }

    public function getTemperatureRating(): ?string
    {
        return $this->temperatureRating;
    }

    public function setTemperatureRating(?string $temperatureRating): self
    {
        $this->temperatureRating = $temperatureRating;

        return $this;
    }

    public function getThreadRating(): ?int
    {
        return $this->threadRating;
    }

    public function setThreadRating(?int $threadRating): self
    {
        $this->threadRating = $threadRating;

        return $this;
    }

    public function getCurrentThread(): ?int
    {
        return $this->currentThread;
    }

    public function setCurrentThread(?int $currentThread): self
    {
        $this->currentThread = $currentThread;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }
}
