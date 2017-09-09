<?php
/**
 * Created by PhpStorm.
 * User: szabolaszlo
 * Date: 2017.09.09.
 * Time: 18:19
 */

namespace Jobz\CoreBundle\Controller;

use Jobz\CoreBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    /**
     * @Route("/login")
     * @Method({"GET", "POST"})
     */
    public function loginAction()
    {
        $helper = $this->get('security.authentication_utils');
        return $this->render(
            'CoreBundle:Security:login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $helper->getLastUsername(),
                'error' => $helper->getLastAuthenticationError(),
            )
        );
    }

    /**
     * Login check
     *
     * @Route("/login_check")
     */
    public function loginCheckAction()
    {
    }

    /**
     * Logout
     *
     * @Route("/logout")
     */
    public function logoutAction()
    {
    }
}
