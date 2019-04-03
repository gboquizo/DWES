<?php
/**
 * Created by PhpStorm.
 * User: Guillermo
 * Date: 14/02/2019
 * Time: 15:43
 */

namespace Blogger\BlogBundle\Services;

use Blogger\BlogBundle\Entity\Blog;
use Doctrine\ORM\EntityManager;

class CommentHelper
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getCommentByBlog(Blog $blog)
    {
        /** @var CommentRepository $commentRepository */
        $commentRepository = $this->em->getRepository("BloggerBlogBundle:Comment");

        $comments = $commentRepository->getCommentsForBlog($blog->getId());

        return $comments;
    }
}