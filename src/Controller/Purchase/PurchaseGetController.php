<?php

declare(strict_types=1);

namespace App\Controller\Purchase;

use App\DataProvider\PurchaseDataProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PurchaseGetController extends AbstractController
{
    public function __construct(private readonly PurchaseDataProvider $dataProvider)
    {
    }

    #[Route('/purchase/{id}', name: 'get_purchase', methods: ['GET'])]
    public function get(int $id): Response
    {
        return $this->json($this->dataProvider->getById((string) $id));
    }
}
