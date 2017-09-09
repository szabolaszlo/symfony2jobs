<?php

namespace Jobz\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class FooterController extends Controller
{
    public function showAction()
    {
        return $this->render('CoreBundle:Footer:show.html.twig', array(
            // ...
        ));
    }
}
