<?php

declare(strict_types=1);

namespace App\Controller\Purchase;

use App\Service\PurchaseCreateService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NewPurchaseController extends AbstractController
{
	public function __construct(
		private readonly PurchaseCreateService $createService,
	) {}

	#[Route('/purchase', name: 'create_purchase', methods: ['POST'])]
	public function create(Request $request): Response
	{
		// @TODO implement validation
		$this->createService->createPurchase($request);

		return new Response('purchase created');
	}
}
