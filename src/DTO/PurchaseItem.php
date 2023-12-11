<?php

declare(strict_types=1);

namespace App\DTO;

readonly class PurchaseItem
{
	public function __construct(
		private string $id,
		private Item $item,
		private int $quantity,
	) {
	}

	public function getId(): string
	{
		return $this->id;
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
