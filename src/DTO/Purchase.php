<?php

declare(strict_types=1);

namespace App\DTO;

readonly class Purchase
{
	/**
	 * @param PurchaseItem[] $purchaseItems
	 */
	public function __construct(
		private string $number,
		private array $purchaseItems,
		private User $user,
		private string $status,
	) {
	}

	public function getNumber(): string
	{
		return $this->number;
	}

	/**
	 * @return PurchaseItem[]
	 */
	public function getPurchaseItems(): array
	{
		return $this->purchaseItems;
	}

	public function getUser(): User
	{
		return $this->user;
	}

	public function getStatus(): string
	{
		return $this->status;
	}
}
