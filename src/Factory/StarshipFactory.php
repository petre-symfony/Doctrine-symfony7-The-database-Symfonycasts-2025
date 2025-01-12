<?php

namespace App\Factory;

use App\Entity\Starship;
use App\Entity\StarshipStatusEnum;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Starship>
 */
final class StarshipFactory extends PersistentProxyObjectFactory {
	/**
	 * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
	 *
	 * @todo inject services if required
	 */
	public function __construct() {
	}

	public static function class(): string {
		return Starship::class;
	}

	/**
	 * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
	 *
	 * @todo add your default values here
	 */
	protected function defaults(): array|callable {
		return [
			'arrivedAt' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
			'captain' => self::faker()->text(),
			'class' => self::faker()->text(),
			'name' => self::faker()->text(),
			'status' => self::faker()->randomElement(StarshipStatusEnum::cases()),
		];
	}

	/**
	 * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
	 */
	protected function initialize(): static {
		return $this// ->afterInstantiate(function(Starship $starship): void {})
			;
	}
}
