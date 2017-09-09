<?php

namespace Jobz\CoreBundle\Controller;

use Jobz\CoreBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * User controller.
 *
 * @Route("user")
 */
class UserController extends Controller
{
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
            'CoreBundle:User:registration.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
}
