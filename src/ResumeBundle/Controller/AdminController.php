<?php

/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace ResumeBundle\Controller;

use ResumeBundle\Entity\Resume;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * AdminController.
 */
class AdminController extends Controller
{



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


    /**
     * @Route("/pdf/{id}", name="pdf")
     */
    public function pdfAction(Request $request)
    {
        $resume = new Resume();
        $resume = $this->getDoctrine()
            ->getManager()
            ->getRepository('ResumeBundle:Resume')
            ->findAll();
        $template = $this->renderView('@Resume/entities/resume/pdf.html.twig',array('Resumes'=>$resume));


        $pdf = new \FPDF();

        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10,$template);


        return new Response($pdf->Output(), 200, array(
            'Content-Type' => 'application/pdf',
        ));
    }


}
