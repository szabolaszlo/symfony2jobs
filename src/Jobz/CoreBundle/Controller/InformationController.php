<?php

namespace Jobz\CoreBundle\Controller;

use Jobz\CoreBundle\Entity\Information;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Information controller.
 *
 * @Route("information")
 */
class InformationController extends Controller
{
    /**
     * Finds and displays a information entity.
     *
     * @Route("/{id}")
     * @Method("GET")
     */
    public function showAction(Information $information)
    {
        return $this->render('CoreBundle:Information:show.html.twig', array(
            'information' => $information
        ));
    }
}
