<?php

namespace WorkingHoursBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use WorkingHoursBundle\Entity\Works;
use WorkingHoursBundle\Form\WorksType;

/**
 * Works controller.
 *
 * @Route("/works")
 */
class WorksController extends Controller
{
    /**
     * Lists all Works entities.
     *
     * @Route("/", name="works_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $works = $em->getRepository('WorkingHoursBundle:Works')->findAll();

        return $this->render('works/index.html.twig', array(
            'works' => $works,
        ));
    }

    /**
     * Creates a new Works entity.
     *
     * @Route("/new", name="works_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $work = new Works();
        $form = $this->createForm('WorkingHoursBundle\Form\WorksType', $work);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($work);
            $em->flush();

            return $this->redirectToRoute('works_show', array('id' => $work->getId()));
        }

        return $this->render('works/new.html.twig', array(
            'work' => $work,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Works entity.
     *
     * @Route("/{id}", name="works_show")
     * @Method("GET")
     */
    public function showAction(Works $work)
    {
        $deleteForm = $this->createDeleteForm($work);

        return $this->render('works/show.html.twig', array(
            'work' => $work,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Works entity.
     *
     * @Route("/{id}/edit", name="works_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Works $work)
    {
        $deleteForm = $this->createDeleteForm($work);
        $editForm = $this->createForm('WorkingHoursBundle\Form\WorksType', $work);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($work);
            $em->flush();

            return $this->redirectToRoute('works_edit', array('id' => $work->getId()));
        }

        return $this->render('works/edit.html.twig', array(
            'work' => $work,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Works entity.
     *
     * @Route("/{id}", name="works_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Works $work)
    {
        $form = $this->createDeleteForm($work);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($work);
            $em->flush();
        }

        return $this->redirectToRoute('works_index');
    }

    /**
     * Creates a form to delete a Works entity.
     *
     * @param Works $work The Works entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Works $work)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('works_delete', array('id' => $work->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
