<?php

namespace App\Repository;

use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;
use DateTime;

trait ArchivableTrait
{
    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?DateTimeInterface $archivedAt = null;

    public function getArchivedAt(): ?DateTimeInterface
    {
        return $this->archivedAt;
    }

    public function setArchivedAt(?DateTimeInterface $archivedAt): self
    {
        $this->archivedAt = $archivedAt;
        return $this;
    }

    /**
     * Vérifie si l'élément est archivé (si archivedAt n'est pas null).
     */
    public function isArchived(): bool
    {
        return $this->archivedAt !== null;
    }

    /**
     * Définit la date d'archivage actuelle.
     */
    public function archive(): void
    {
        $this->archivedAt = new DateTime();
    }

    /**
     * Supprime la date d'archivage en la mettant à null.
     */
    public function unarchive(): void
    {
        $this->archivedAt = null;
    }
}
