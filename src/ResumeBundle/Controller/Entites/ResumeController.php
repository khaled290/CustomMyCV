<?php

namespace ResumeBundle\Controller\Entites;

use ResumeBundle\Entity\Resume;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Resume controller.
 *
 * @Route("resume")
 */
class ResumeController extends Controller
{
    /**
     * Lists all resume entities.
     *
     * @Route("/", name="resume_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $resumes = $em->getRepository('ResumeBundle:Resume')->findAll();

        return $this->render('@Resume/entities/resume/index.html.twig', array(
            'resumes' => $resumes,
        ));
    }

    /**
     * Creates a new resume entity.
     *
     * @Route("/new", name="resume_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $resume = new Resume();
        $form = $this->createForm('ResumeBundle\Form\ResumeType', $resume);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($resume);
            $em->flush();

            return $this->redirectToRoute('resume_show', array('id' => $resume->getId()));
        }

        return $this->render('@Resume/entities/resume/new.html.twig', array(
            'resume' => $resume,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a resume entity.
     *
     * @Route("/{id}", name="resume_show")
     * @Method("GET")
     */
    public function showAction(Resume $resume)
    {
        $deleteForm = $this->createDeleteForm($resume);

        return $this->render('@Resume/entities/resume/show.html.twig', array(
            'resume' => $resume,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing resume entity.
     *
     * @Route("/{id}/edit", name="resume_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Resume $resume)
    {
        $deleteForm = $this->createDeleteForm($resume);
        $editForm = $this->createForm('ResumeBundle\Form\ResumeType', $resume);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('resume_edit', array('id' => $resume->getId()));
        }

        return $this->render('@Resume/entities/resume/edit.html.twig', array(
            'resume' => $resume,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a resume entity.
     *
     * @Route("/{id}", name="resume_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Resume $resume)
    {
        $form = $this->createDeleteForm($resume);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($resume);
            $em->flush();
        }

        return $this->redirectToRoute('resume_index');
    }

    /**
     * Creates a form to delete a resume entity.
     *
     * @param Resume $resume The resume entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Resume $resume)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('resume_delete', array('id' => $resume->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function listResume()
    {
        $em = $this->getDoctrine()->getManager();
        $listResume = $em->getRepository('ResumeBundle:Resume')->findAll();

        return $this->render('@Resume/entities/resume/listResume.html.twig', array(
            'resumes' => $listResume,
        ));
    }
}
