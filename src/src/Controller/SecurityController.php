<?php

namespace App\Controller;

use App\Form\Model\LoginModel;
use App\Form\Type\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController {

	#[Route(path: '/login', name: 'app_login')]
	public function login(AuthenticationUtils $utils, Request $request) : Response {
		$form = $this->createForm(LoginType::class, new LoginModel());
		$form->submit($request->request->all());
		$error = $utils->getLastAuthenticationError();
		$lastUsername = $utils->getLastUsername();
		return $this->render('security/login.html.twig', [
			'error' => $error,
			'last_username' => $lastUsername,
			'form' => $form->createView(),
		]);
	}

	#[Route(path: '/logout', name: 'app_logout')]
	public function logout() : void {}

}
