<?php

namespace Jobz\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class FooterController extends Controller
{
    public function showAction()
    {
        $information = $this
            ->getDoctrine()
            ->getRepository('CoreBundle:Information')
            ->findBy(array('position' => 'footer'));

        return $this->render('CoreBundle:Footer:show.html.twig', array(
            'information' => $information
        ));
    }
}
