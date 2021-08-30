<?php

namespace App\Entity;

use App\Repository\MaintenanceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MaintenanceRepository::class)
 */
class Maintenance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $kmsMant;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateMant;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $tyres;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $brakes;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $shocksAbsorber;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $oil;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $oilFilter;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $fuelFilter;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cabinFilter;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $airFilter;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $itv;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $timingBelt;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $battery;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $ac;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $other;

    /**
     * @ORM\ManyToOne(targetEntity=Vehicle::class, inversedBy="maintenances")
     */
    private $idVehicle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKmsMant(): ?int
    {
        return $this->kmsMant;
    }

    public function setKmsMant(?int $kmsMant): self
    {
        $this->kmsMant = $kmsMant;

        return $this;
    }

    public function getDateMant(): ?\DateTimeInterface
    {
        return $this->dateMant;
    }

    public function setDateMant(?\DateTimeInterface $dateMant): self
    {
        $this->dateMant = $dateMant;

        return $this;
    }

    public function getTyres(): ?string
    {
        return $this->tyres;
    }

    public function setTyres(?string $tyres): self
    {
        $this->tyres = $tyres;

        return $this;
    }

    public function getBrakes(): ?string
    {
        return $this->brakes;
    }

    public function setBrakes(?string $brakes): self
    {
        $this->brakes = $brakes;

        return $this;
    }

    public function getShocksAbsorber(): ?string
    {
        return $this->shocksAbsorber;
    }

    public function setShocksAbsorber(?string $shocksAbsorber): self
    {
        $this->shocksAbsorber = $shocksAbsorber;

        return $this;
    }

    public function getOil(): ?string
    {
        return $this->oil;
    }

    public function setOil(?string $oil): self
    {
        $this->oil = $oil;

        return $this;
    }

    public function getOilFilter(): ?bool
    {
        return $this->oilFilter;
    }

    public function setOilFilter(?bool $oilFilter): self
    {
        $this->oilFilter = $oilFilter;

        return $this;
    }

    public function getFuelFilter(): ?bool
    {
        return $this->fuelFilter;
    }

    public function setFuelFilter(?bool $fuelFilter): self
    {
        $this->fuelFilter = $fuelFilter;

        return $this;
    }

    public function getCabinFilter(): ?bool
    {
        return $this->cabinFilter;
    }

    public function setCabinFilter(?bool $cabinFilter): self
    {
        $this->cabinFilter = $cabinFilter;

        return $this;
    }

    public function getAirFilter(): ?bool
    {
        return $this->airFilter;
    }

    public function setAirFilter(?bool $airFilter): self
    {
        $this->airFilter = $airFilter;

        return $this;
    }

    public function getItv(): ?\DateTimeInterface
    {
        return $this->itv;
    }

    public function setItv(?\DateTimeInterface $itv): self
    {
        $this->itv = $itv;

        return $this;
    }

    public function getTimingBelt(): ?bool
    {
        return $this->timingBelt;
    }

    public function setTimingBelt(?bool $timingBelt): self
    {
        $this->timingBelt = $timingBelt;

        return $this;
    }

    public function getBattery(): ?bool
    {
        return $this->battery;
    }

    public function setBattery(?bool $battery): self
    {
        $this->battery = $battery;

        return $this;
    }

    public function getAc(): ?bool
    {
        return $this->ac;
    }

    public function setAc(?bool $ac): self
    {
        $this->ac = $ac;

        return $this;
    }

    public function getOther(): ?string
    {
        return $this->other;
    }

    public function setOther(?string $other): self
    {
        $this->other = $other;

        return $this;
    }

    public function getIdVehicle(): ?Vehicle
    {
        return $this->idVehicle;
    }

    public function setIdVehicle(?Vehicle $idVehicle): self
    {
        $this->idVehicle = $idVehicle;

        return $this;
    }

    
}
