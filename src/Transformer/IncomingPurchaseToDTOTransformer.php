<?php

declare(strict_types=1);

namespace App\Transformer;

use App\DTO\Purchase;
use Symfony\Component\HttpFoundation\Request;

class IncomingPurchaseToDTOTransformer
{
	public function transform(Request $request): Purchase
	{
		$content = \json_decode($request->getContent(), true);

		return new Purchase(
			(string) \random_int(100, 999),

		);
	}
}
