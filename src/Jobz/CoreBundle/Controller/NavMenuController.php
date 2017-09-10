<?php

namespace Jobz\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class NavMenuController extends Controller
{
    public function showAction()
    {
        $information = $this
            ->getDoctrine()
            ->getRepository('CoreBundle:Information')
            ->findBy(array('position' => 'header'));

        return $this->render('CoreBundle:NavMenu:show.html.twig', array(
            'information' => $information
        ));
    }
}
