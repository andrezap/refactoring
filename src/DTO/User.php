<?php

declare(strict_types=1);

namespace App\DTO;

readonly class User
{
	public function __construct(
		private string $id,
		private string $name,
		private string $address,
		private string $dateOfBirth,
	) {
	}

	public function getId(): string
	{
		return $this->id;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function getAddress(): string
	{
		return $this->address;
	}

	public function getDateOfBirth(): string
	{
		return $this->dateOfBirth;
	}
}
