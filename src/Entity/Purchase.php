<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Purchase
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private readonly int $id;

    #[ORM\Column]
    private readonly string $number;

    #[ORM\OneToMany(mappedBy: 'purchase', targetEntity: PurchaseItem::class, cascade: ['persist'])]
    private Collection $purchaseItems;

    #[ORM\ManyToOne(targetEntity: User::class)]
    private User $user;

    #[ORM\Column]
    private string $status;

    public function __construct(string $number, User $user)
    {
        $this->number = $number;
        $this->user = $user;
        $this->status = 'new';
        $this->purchaseItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function addItem(PurchaseItem $item): void
    {
        $this->purchaseItems[] = $item;
    }

    public function getItems(): Collection
    {
        return $this->purchaseItems;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
}
