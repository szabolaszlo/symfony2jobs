<?php

namespace Jobz\CoreBundle\Controller;

use Jobz\CoreBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CategoryController extends Controller
{
    /**
     * @Route("/category/{id}")
     */
    public function showAction(Category $category)
    {
        $jobs = $this
            ->getDoctrine()
            ->getRepository('CoreBundle:Job')
            ->findBy(array('category' => $category), array('createdAt' => 'ASC'));

        return $this->render('CoreBundle:Category:show.html.twig', array(
            'jobs' => $jobs,
            'category' => $category
        ));
    }
}
