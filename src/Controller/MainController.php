<?php

namespace App\Controller;

use App\Entity\Starship;
use App\Repository\StarshipRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController {
	#[Route('/', name: 'app_homepage')]
	public function homepage(
		StarshipRepository $repository,
	): Response {
		$ships = $repository->findIncomplete();
		$myShip = $ships[array_rand($ships)];

		return $this->render('main/homepage.html.twig', [
			'myShip' => $myShip,
			'ships' => $ships,
		]);
	}
}
