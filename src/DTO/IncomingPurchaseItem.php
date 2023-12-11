<?php

declare(strict_types=1);

namespace App\DTO;

readonly class IncomingPurchaseItem
{
	public function __construct(
		private string $name,
		private string $status,
	) {
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function getStatus(): string
	{
		return $this->status;
	}
}
