<?php
/**
 * Created by PhpStorm.
 * User: Guillermo
 * Date: 14/02/2019
 * Time: 8:31
 */

namespace Blogger\BlogBundle\Services;


use Blogger\BlogBundle\Repository\BlogRepository;
use Doctrine\ORM\EntityManager;

class BlogHelper
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }


    public function getBlogs($id)
    {
        /** @var BlogRepository $blogRepository */
        $blogRepository = $this->em->getRepository("BloggerBlogBundle:Blog");

        $blogs = $blogRepository->find($id);

        return $blogs;
    }

    public function getLatestBlogs()
    {
        /** @var BlogRepository $blogRepository */
        $blogRepository = $this->em->getRepository("BloggerBlogBundle:Blog");

        $blogs = $blogRepository->getLatestBlogs();

        return $blogs;
    }
}