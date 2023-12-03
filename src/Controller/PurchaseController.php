<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Purchase;
use App\Entity\PurchaseItem;
use App\Repository\ItemRepository;
use App\Repository\PurchaseRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PurchaseController extends AbstractController
{
    public function __construct(
        private PurchaseRepository $purchaseRepository,
        private ItemRepository $itemRepository,
        private UserRepository $userRepository,
    ) {}

    #[Route('/purchase', name: 'get_all_purchase', methods: ['GET'])]
    public function all(): Response
    {
        $orders = $this->purchaseRepository->findAll();

        return $this->json($orders);
    }

    #[Route('/purchase', name: 'create_purchase', methods: ['POST'])]
    public function create(Request $request): Response
    {
        $content = json_decode($request->getContent(), true);
        $user = $this->userRepository->find($content['user_id']);

        $purchase = new Purchase('1111', $user);
        $items = $content['items_id'];

        foreach ($items as $item) {
            $item1 = $this->itemRepository->find($item);
            $purchaseItem = new PurchaseItem($item1, $purchase);
            $purchase->addItem($purchaseItem);
        }

        $this->purchaseRepository->add($purchase);

        return new Response('purchase created');
    }

    #[Route('/purchase/{id}', name: 'get_purchase', methods: ['GET'])]
    public function get(int $id): Response
    {
        $purchase = $this->purchaseRepository->find($id);

        return $this->json($purchase);
    }
}
