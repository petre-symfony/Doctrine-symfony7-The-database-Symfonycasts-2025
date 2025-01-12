<?php

namespace App\Controller;

use App\Model\StarshipRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController {
	#[Route('/', name: 'app_homepage')]
	public function homepage(
		EntityManagerInterface $em,
	): Response {
		$ships = $starshipRepository->findAll();
		$myShip = $ships[array_rand($ships)];

		return $this->render('main/homepage.html.twig', [
			'myShip' => $myShip,
			'ships' => $ships,
		]);
	}
}
