<?php

declare(strict_types=1);

namespace App\Service;

use App\DataPersister\PurchaseDataPersister;
use App\DTO\IncomingPurchase;
use App\DTO\IncomingPurchaseItem;
use Symfony\Component\HttpFoundation\Request;

readonly class PurchaseCreateService
{
	public function __construct(
		private UserDataProvider $userDataProvider,
		private PurchaseDataPersister $purchaseDataPersister,
	) {
	}

	public function createPurchase(Request $request): void
	{
		$content = \json_decode($request->getContent(), true);

		$incomingPurchase = new IncomingPurchase(
			$this->userDataProvider->getById($content['user_id']),
			$this->transformMany($content['items_id']),
		);

		$this->purchaseDataPersister->createPurchase($incomingPurchase);
	}

	private function transformMany(array $incomingItems): array
	{
		$items = [];
		foreach ($incomingItems as $incomingItem) {
			$items[] = $this->transformSingle($incomingItem);
		}

		return $items;
	}

	private function transformSingle(array $incomingPurchaseItem): IncomingPurchaseItem
	{
		return new IncomingPurchaseItem($incomingPurchaseItem['name'], $incomingPurchaseItem['status']);
	}
}

