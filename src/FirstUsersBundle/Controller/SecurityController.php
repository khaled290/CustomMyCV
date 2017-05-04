<?php

namespace FirstUsersBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{


    /**
     * @param Request $request
     * @Route("/login")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function loginAction(Request $request) {

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {

            return $this->redirectToRoute('firstusers_security_login');

        }

        // Le service authentication_utils permet de récupérer le nom d'utilisateur

        // et l'erreur dans le cas où le formulaire a déjà été soumis mais était invalide

        // (mauvais mot de passe par exemple)

        $authenticationUtils = $this->get('security.authentication_utils');


        return $this->render('FirstUsersBundle:Security:login.html.twig', array(

            'last_username' => $authenticationUtils->getLastUsername(),

            'error'         => $authenticationUtils->getLastAuthenticationError(),

        ));
    }
}
