<?php

namespace App\Controller;

use App\Entity\Starship;
use App\Repository\StarshipRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController {
	#[Route('/', name: 'app_homepage')]
	public function homepage(
		StarshipRepository $repository,
		Request $request
	): Response {
		$ships = $repository->findIncomplete();
		$ships->setMaxPerPage(5);
		$ships->setCurrentPage($request->query->get('page', 1));
		$myShip = $repository->findMyShip();

		return $this->render('main/homepage.html.twig', [
			'myShip' => $myShip,
			'ships' => $ships,
		]);
	}
}
