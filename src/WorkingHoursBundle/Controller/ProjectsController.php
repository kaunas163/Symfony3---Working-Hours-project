<?php

namespace WorkingHoursBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use WorkingHoursBundle\Entity\Projects;
use WorkingHoursBundle\Form\ProjectsType;

/**
 * Projects controller.
 *
 * @Route("/projects")
 */
class ProjectsController extends Controller
{
    /**
     * Lists all Projects entities.
     *
     * @Route("/", name="projects_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $projects = $em->getRepository('WorkingHoursBundle:Projects')->findAll();

        return $this->render('projects/index.html.twig', array(
            'projects' => $projects,
        ));
    }

    /**
     * Creates a new Projects entity.
     *
     * @Route("/new", name="projects_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $project = new Projects();
        $form = $this->createForm('WorkingHoursBundle\Form\ProjectsType', $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();

            return $this->redirectToRoute('projects_show', array('id' => $project->getId()));
        }

        return $this->render('projects/new.html.twig', array(
            'project' => $project,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Projects entity.
     *
     * @Route("/{id}", name="projects_show")
     * @Method("GET")
     */
    public function showAction(Projects $project)
    {
        $deleteForm = $this->createDeleteForm($project);

        return $this->render('projects/show.html.twig', array(
            'project' => $project,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Projects entity.
     *
     * @Route("/{id}/edit", name="projects_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Projects $project)
    {
        $deleteForm = $this->createDeleteForm($project);
        $editForm = $this->createForm('WorkingHoursBundle\Form\ProjectsType', $project);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();

            return $this->redirectToRoute('projects_edit', array('id' => $project->getId()));
        }

        return $this->render('projects/edit.html.twig', array(
            'project' => $project,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Projects entity.
     *
     * @Route("/{id}", name="projects_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Projects $project)
    {
        $form = $this->createDeleteForm($project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($project);
            $em->flush();
        }

        return $this->redirectToRoute('projects_index');
    }

    /**
     * Creates a form to delete a Projects entity.
     *
     * @param Projects $project The Projects entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Projects $project)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('projects_delete', array('id' => $project->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
