<?php

namespace ResumeBundle\Controller\Entites;

use ResumeBundle\Entity\Hobby;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Hobby controller.
 *
 * @Route("loisir")
 */
class HobbyController extends Controller
{
    /**
     * Lists all hobby entities.
     *
     * @Route("/", name="loisir_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $hobbies = $em->getRepository('ResumeBundle:Hobby')->findAll();

        return $this->render('@Resume/entities/hobby/index.html.twig', array(
            'hobbies' => $hobbies,
        ));
    }

    /**
     * Creates a new hobby entity.
     *
     * @Route("/new", name="loisir_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $hobby = new Hobby();
        $form = $this->createForm('ResumeBundle\Form\HobbyType', $hobby);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($hobby);
            $em->flush();

            return $this->redirectToRoute('loisir_show', array('id' => $hobby->getId()));
        }

        return $this->render('@Resume/entities/hobby/new.html.twig', array(
            'hobby' => $hobby,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a hobby entity.
     *
     * @Route("/{id}", name="loisir_show")
     * @Method("GET")
     */
    public function showAction(Hobby $hobby)
    {
        $deleteForm = $this->createDeleteForm($hobby);

        return $this->render('@Resume/entities/hobby/show.html.twig', array(
            'hobby' => $hobby,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing hobby entity.
     *
     * @Route("/{id}/edit", name="loisir_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Hobby $hobby)
    {
        $deleteForm = $this->createDeleteForm($hobby);
        $editForm = $this->createForm('ResumeBundle\Form\HobbyType', $hobby);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('loisir_edit', array('id' => $hobby->getId()));
        }

        return $this->render('@Resume/entities/hobby/edit.html.twig', array(
            'hobby' => $hobby,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a hobby entity.
     *
     * @Route("/{id}", name="loisir_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Hobby $hobby)
    {
        $form = $this->createDeleteForm($hobby);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($hobby);
            $em->flush();
        }

        return $this->redirectToRoute('loisir_index');
    }

    /**
     * Creates a form to delete a hobby entity.
     *
     * @param Hobby $hobby The hobby entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Hobby $hobby)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('loisir_delete', array('id' => $hobby->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
