<?php

declare(strict_types=1);

namespace App\Controller\Purchase;

use App\Repository\PurchaseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PurchaseListController extends AbstractController
{
	public function __construct(
		private readonly PurchaseRepository $purchaseRepository
	) {}

	#[Route('/purchase', name: 'get_all_purchase', methods: ['GET'])]
	public function __invoke(): Response
	{
		// Maybe it would be worth implementing pagination
		// As findAll sounds scary
		$orders = $this->purchaseRepository->findAll();

		return $this->json($orders);
	}
}
