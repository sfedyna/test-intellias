<?php

namespace Intellias\TestBundle\Controller;

use Intellias\TestBundle\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Project controller.
 *
 * @Route("project")
 */
class ProjectController extends Controller
{
    /**
     * Lists all project entities.
     *
     * @Route("/", name="project_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $projects = $em->getRepository('IntelliasTestBundle:Project')->findAll();

        return $this->render('IntelliasTestBundle:Project:index.html.twig', array(
            'projects' => $projects,
        ));
    }

    /**
     * Creates a new project entity.
     *
     * @Route("/new", name="project_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $project = new Project();
        $form = $this->createForm('Intellias\TestBundle\Form\ProjectType', $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush($project);
            return $this->redirectToRoute('project_index');
        }

        return $this->render('IntelliasTestBundle:Project:new.html.twig', array(
            'project' => $project,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a project entity.
     *
     * @Route("/{id}", name="project_show")
     * @Method("GET")
     */
    public function showAction(Project $project)
    {
        return $this->render('IntelliasTestBundle:Project:show.html.twig', array(
            'project' => $project,
        ));
    }

    /**
     * Displays a form to edit an existing project entity.
     *
     * @Route("/{id}/edit", name="project_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Project $project)
    {
        $editForm = $this->createForm('Intellias\TestBundle\Form\ProjectType', $project);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('project_index');
        }
        return $this->render('IntelliasTestBundle:Project:edit.html.twig', array(
            'project' => $project,
            'edit_form' => $editForm->createView()
        ));
    }

    /**
     * Deletes a project entity.
     *
     * @Route("/{id}/delete", name="project_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, Project $project)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($project);
        $em->flush($project);
        return $this->redirectToRoute('project_index');
    }

}
