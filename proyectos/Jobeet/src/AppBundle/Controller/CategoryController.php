<?php
/**
 * Created by PhpStorm.
 * User: Guillermo
 * Date: 02/03/2019
 * Time: 1:06
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * Category controller.
 */
class CategoryController extends Controller

{
    /**
     * Finds and displays a category entity.
     *
     * @Route("/category/{slug}", defaults={"page": 1}, name="category_show", methods={"GET"})
     *
     */
    public function showAction(Request $request, $slug, $page )
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('AppBundle:Category')->findOneBySlug($slug);
        if (!$category) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }
        $total_jobs = $em->getRepository('AppBundle:Job')->countActiveJobs($category->getId());
        $jobs_per_page = $this->container->getParameter('max_jobs_on_category');
        $last_page = ceil($total_jobs / $jobs_per_page);
        $previous_page = $page > 1 ? $page - 1 : 1;
        $next_page = $page < $last_page ? $page + 1 : $last_page;

        $category->setActiveJobs($em->getRepository('AppBundle:Job')->getActiveJobs($category->getId(), $jobs_per_page, ($page - 1) * $jobs_per_page));
        $page = $request->query->get("page");

        return $this->render('category/show.html.twig', array(
            'category' => $category,
            'last_page' => $last_page,
            'previous_page' => $previous_page,
            'current_page' => $page,
            'next_page' => $next_page,
            'total_jobs' => $total_jobs
        ));
    }
}