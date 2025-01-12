<?php

namespace App\Controller;

use App\Entity\Starship;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StarshipController extends AbstractController {
	#[Route('/starships/{id<\d+>}', name: 'app_starship_show')]
	public function show(int $id, EntityManagerInterface $em): Response {
		$ship = $em->find(Starship::class, $id);
		if (!$ship) {
			throw $this->createNotFoundException('Starship not found');
		}

		return $this->render('starship/show.html.twig', [
			'ship' => $ship,
		]);
	}
}
