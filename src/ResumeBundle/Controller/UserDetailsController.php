<?php

namespace ResumeBundle\Controller;

use ResumeBundle\Entity\UserDetails;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Userdetail controller.
 *
 * @Route("informations")
 */
class UserDetailsController extends Controller
{
    /**
     * Lists all userDetail entities.
     *
     * @Route("/", name="informations_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $userDetails = $em->getRepository('ResumeBundle:UserDetails')->findAll();

        return $this->render('@Resume/TemplateAdmin/views/pages/index.html.twig', array(
            'userDetails' => $userDetails,
        ));
    }

    /**
     * Creates a new userDetail entity.
     *
     * @Route("/new", name="informations_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $userDetail = new Userdetail();
        $form = $this->createForm('ResumeBundle\Form\UserDetailsType', $userDetail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($userDetail);
            $em->flush();

            return $this->redirectToRoute('informations_show', array('id' => $userDetail->getId()));
        }

        return $this->render('userdetails/new.html.twig', array(
            'userDetail' => $userDetail,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a userDetail entity.
     *
     * @Route("/{id}", name="informations_show")
     * @Method("GET")
     */
    public function showAction(UserDetails $userDetail)
    {
        $deleteForm = $this->createDeleteForm($userDetail);

        return $this->render('userdetails/show.html.twig', array(
            'userDetail' => $userDetail,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing userDetail entity.
     *
     * @Route("/{id}/edit", name="informations_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, UserDetails $userDetail)
    {
        $deleteForm = $this->createDeleteForm($userDetail);
        $editForm = $this->createForm('ResumeBundle\Form\UserDetailsType', $userDetail);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('informations_edit', array('id' => $userDetail->getId()));
        }

        return $this->render('userdetails/edit.html.twig', array(
            'userDetail' => $userDetail,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a userDetail entity.
     *
     * @Route("/{id}", name="informations_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, UserDetails $userDetail)
    {
        $form = $this->createDeleteForm($userDetail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($userDetail);
            $em->flush();
        }

        return $this->redirectToRoute('informations_index');
    }

    /**
     * Creates a form to delete a userDetail entity.
     *
     * @param UserDetails $userDetail The userDetail entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(UserDetails $userDetail)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('informations_delete', array('id' => $userDetail->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
