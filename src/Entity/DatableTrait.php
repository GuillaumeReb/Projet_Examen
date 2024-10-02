<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

trait DatableTrait
{
    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTime $createdAt;

    #[ORM\Column(type: 'integer')]
    private $year;

    #[ORM\Column(type: 'integer')]
    private $month;

    public function __construct()
    {
        $this->createdAt = new DateTime();
        $this->initYearAndMonth();
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * Setter pour createdAt.
     * Définit la date de création et met à jour year et month.
     */
    public function setCreatedAt(DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;
        $this->initYearAndMonth();

        return $this;
    }

    public function getYear(): int
    {
        return $this->year;
    }
    public function getMonth(): int
    {
        return $this->month;
    }

    private function initYearAndMonth(): void
    {
        $this->year = (int) $this->createdAt->format('Y');
        $this->month = (int) $this->createdAt->format('m');
    }
}
