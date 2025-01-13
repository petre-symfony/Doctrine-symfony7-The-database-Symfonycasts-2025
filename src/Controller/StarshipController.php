<?php

namespace App\Controller;

use App\Entity\Starship;
use App\Repository\StarshipRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StarshipController extends AbstractController {
	#[Route('/starships/{slug}', name: 'app_starship_show')]
	public function show(Starship $ship): Response {

		return $this->render('starship/show.html.twig', [
			'ship' => $ship,
		]);
	}
}
