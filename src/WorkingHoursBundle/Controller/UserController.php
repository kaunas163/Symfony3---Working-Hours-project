<?php

namespace WorkingHoursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Users controller.
 *
 * @Route("/user")
 */
class UserController extends Controller
{
    /**
     * @Route("/info", name="user_info")
     */
    public function indexAction()
    {
        return $this->render('WorkingHoursBundle:User:index.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/login", name="user_login")
     */
    public function loginAction()
    {
        return $this->render('WorkingHoursBundle:User:login.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/logout", name="user_logout")
     */
    public function logoutAction()
    {
        return $this->render('WorkingHoursBundle:User:logout.html.twig', array(
            // ...
        ));
    }

}
