<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Job;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;

/**
 * Job controller.
 *
 * @Route("job")
 */
class JobController extends Controller
{
    /**
     * Lists all job entities.
     *
     * @Route("/", name="job_index", methods={"GET"}))
     *
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('AppBundle:Category')->getWithJobs();

        foreach ($categories as $category) {
            $category->setActiveJobs($em->getRepository('AppBundle:Job')->getActiveJobs($category->getId(), $this->container->getParameter('max_jobs_on_homepage')));
            $category->setMoreJobs($em->getRepository('AppBundle:Job')->countActiveJobs($category->getId()) - $this->container->getParameter('max_jobs_on_homepage'));
        }
        return $this->render('job/index.html.twig', array(
            'categories' => $categories
        ));
    }

    /**
     * Creates a new job entity.
     *
     * @Route("/new", name="job_new", methods={"GET","POST"}))
     *
     */
    public function newAction(Request $request)
    {
        $job = new Job();
        $form = $this->createForm('AppBundle\Form\JobType', $job);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($job);
            $em->flush();

            return $this->redirectToRoute('job_show', array('id' => $job->getId()));
        }

        return $this->render('job/new.html.twig', array(
            'job' => $job,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a job entity.
     *
     * @Route("/{company}/{location}/{id}/{position}", name="job_show", requirements={"id" = "\d+"}, methods={"GET"}))
     * @Entity("job", expr="repository.getActiveJob(id)")
     *
     */
    public function showAction(Job $job)
    {
        $deleteForm = $this->createDeleteForm($job);

        return $this->render('job/show.html.twig', array(
            'job' => $job,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing job entity.
     *
     * @Route("/{id}/edit", name="job_edit", methods={"GET","POST"}))
     *
     */
    public function editAction(Request $request, Job $job)
    {
        $deleteForm = $this->createDeleteForm($job);
        $editForm = $this->createForm('AppBundle\Form\JobType', $job);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('job_edit', array('id' => $job->getId()));
        }

        return $this->render('job/edit.html.twig', array(
            'job' => $job,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a job entity.
     *
     * @Route("/{id}", name="job_delete", methods={"DELETE"}))
     *
     */
    public function deleteAction(Request $request, Job $job)
    {
        $form = $this->createDeleteForm($job);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($job);
            $em->flush();
        }

        return $this->redirectToRoute('job_index');
    }

    /**
     * Creates a form to delete a job entity.
     *
     * @param Job $job The job entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Job $job)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('job_delete', array('id' => $job->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
