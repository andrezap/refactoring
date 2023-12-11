<?php

declare(strict_types=1);

namespace App\DTO;

use App\Entity\User;

readonly class IncomingPurchase
{
	/**
	 * @param IncomingPurchaseItem[] $items
	 */
	public function __construct(
		private User $user,
		private array $items,
	) {
	}

	public function getUser(): User
	{
		return $this->user;
	}

	/**
	 * @return IncomingPurchaseItem[]
	 */
	public function getItems(): array
	{
		return $this->items;
	}
}
