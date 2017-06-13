<?php

/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace ResumeBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * AdminController.
 */
class AdminController extends Controller
{
//    function __construct() {
//        $this->listResume();
//    }
    /**
     * @Route("/dashboard", name="app_homepage")
     *
     * @param Request $request Request
     *
     * @return Response
     */
    public function DashboardpageAction(Request $request)
    {
        return $this->render('@Resume/TemplateAdmin/views/pages/index.html.twig', []);
    }

    public function listResume(){
        // On récupère le service
        $container = new ContainerBuilder();
        $listeResume = $container->get('resumebundle.entites.resumeController');
        return $listeResume-> listResume();
    }

}
