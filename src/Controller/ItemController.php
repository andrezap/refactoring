<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\ItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ItemController extends AbstractController
{
    public function __construct(private ItemRepository $itemRepository) {}

    #[Route('/item', name: 'get_items')]
    public function get(): Response
    {
        $items = $this->itemRepository->findAll();

        return $this->json($items);
    }
}
