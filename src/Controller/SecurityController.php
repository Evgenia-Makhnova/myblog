<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
<<<<<<< HEAD
        if ($this->getUser() !== null) {
            return new RedirectResponse($this->generateUrl('about'));
        }
=======
		if ($this->getUser() !== null){
		return new RedirectResponse($this->generateUrl('about'));
		}
>>>>>>> a39f7e51a2b71bf646c50a13e2ffe5d3f38d67ea
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }


    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        //throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
<<<<<<< HEAD
        return new RedirectResponse($this->generateUrl('about'));
=======
            return new RedirectResponse($this->generateUrl('about'));

>>>>>>> a39f7e51a2b71bf646c50a13e2ffe5d3f38d67ea
    }
}
