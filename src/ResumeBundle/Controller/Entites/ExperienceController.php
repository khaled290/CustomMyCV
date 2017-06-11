<?php

namespace ResumeBundle\Controller\Entites;

use ResumeBundle\Entity\Experience;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Experience controller.
 *
 * @Route("experience")
 */
class ExperienceController extends Controller
{
    /**
     * Lists all experience entities.
     *
     * @Route("/", name="experience_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $experiences = $em->getRepository('ResumeBundle:Experience')->findAll();

        return $this->render('@Resume/entities/experience/index.html.twig', array(
            'experiences' => $experiences,
        ));
    }

    /**
     * Creates a new experience entity.
     *
     * @Route("/new", name="experience_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $experience = new Experience();
        $form = $this->createForm('ResumeBundle\Form\ExperienceType', $experience);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($experience);
            $em->flush();

            return $this->redirectToRoute('experience_show', array('id' => $experience->getId()));
        }

        return $this->render('@Resume/entities/experience/new.html.twig', array(
            'experience' => $experience,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a experience entity.
     *
     * @Route("/{id}", name="experience_show")
     * @Method("GET")
     */
    public function showAction(Experience $experience)
    {
        $deleteForm = $this->createDeleteForm($experience);

        return $this->render('@Resume/entities/experience/show.html.twig', array(
            'experience' => $experience,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing experience entity.
     *
     * @Route("/{id}/edit", name="experience_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Experience $experience)
    {
        $deleteForm = $this->createDeleteForm($experience);
        $editForm = $this->createForm('ResumeBundle\Form\ExperienceType', $experience);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('experience_edit', array('id' => $experience->getId()));
        }

        return $this->render('@Resume/entities/experience/edit.html.twig', array(
            'experience' => $experience,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a experience entity.
     *
     * @Route("/{id}", name="experience_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Experience $experience)
    {
        $form = $this->createDeleteForm($experience);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($experience);
            $em->flush();
        }

        return $this->redirectToRoute('experience_index');
    }

    /**
     * Creates a form to delete a experience entity.
     *
     * @param Experience $experience The experience entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Experience $experience)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('experience_delete', array('id' => $experience->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
