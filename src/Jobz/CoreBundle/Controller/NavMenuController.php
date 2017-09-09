<?php

namespace Jobz\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class NavMenuController extends Controller
{
    public function showAction()
    {
        return $this->render('CoreBundle:NavMenu:show.html.twig', array(
            // ...
        ));
    }
}
