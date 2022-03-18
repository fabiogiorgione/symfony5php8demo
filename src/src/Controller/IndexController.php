<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController {

	#[Route(path: '/', name: 'home_page')]
	public function index() : Response {
		return $this->render('index.html.twig', []);
	}

}
