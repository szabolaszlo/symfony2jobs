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


    /**
     * Register
     *
     * @Route("/registration")
     */
    public function registrationAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm('Jobz\CoreBundle\Form\UserType', $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user->setRoles('ROLE_USER');
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('jobz_core_security_login');
        }
        return $this->render(
            'CoreBundle:Security:registration.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
}