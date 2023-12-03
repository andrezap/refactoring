<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PurchaseItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PurchaseItemRepository::class)]
class PurchaseItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private readonly int $id;

    #[ORM\ManyToOne(targetEntity: Purchase::class, inversedBy: 'purchaseItems')]
    private readonly Purchase $purchase;

    #[ORM\ManyToOne(targetEntity: Item::class)]
    private Item $item;

    #[ORM\Column]
    private int $quantity;

    public function __construct(Item $item, Purchase $purchase)
    {
        $this->item = $item;
        $this->quantity = 1;
        $this->purchase = $purchase;
    }

    public function getItem(): Item
    {
        return $this->item;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
