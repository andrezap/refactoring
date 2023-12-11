<?php

declare(strict_types=1);

namespace App\DataProvider;

use App\DTO\Purchase;
use App\Repository\PurchaseRepository;

class PurchaseDataProvider
{
	public function __construct(private readonly PurchaseRepository $purchaseRepository)
	{
	}

	public function getById(string $id): Purchase
	{
		$purchase = $this->purchaseRepository->find($id);

		// @TODO implement transformation from Entity to DTO
		return new Purchase(

		);
	}

	public function findAllPaginated(): array
	{
		// @TODO implement pagination
		return [];
	}
}
