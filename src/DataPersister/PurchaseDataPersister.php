<?php

declare(strict_types=1);

namespace App\DataPersister;

use App\DTO\IncomingPurchase;
use App\Entity\Purchase;
use App\Entity\PurchaseItem;
use Doctrine\ORM\EntityManagerInterface;

readonly class PurchaseDataPersister
{
	public function __construct(private EntityManagerInterface $entityManager)
	{
	}

	public function createPurchase(IncomingPurchase $purchaseModel): void
	{
		$purchase = new Purchase(
			(string) \random_int(1, 9999),
			$purchaseModel->getUser(),
		);

		foreach ($purchaseModel->getItems() as $item) {
			//@TODO implement transformation to Entity
			$purchaseItem = new PurchaseItem($item, $purchase);
			$purchase->addItem($purchaseItem);
		}

		$this->entityManager->persist($purchase);
		$this->entityManager->flush();
	}
}