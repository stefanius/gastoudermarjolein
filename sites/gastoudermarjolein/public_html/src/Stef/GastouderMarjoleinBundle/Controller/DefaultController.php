<?php

namespace Stef\GastouderMarjoleinBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('StefGastouderMarjoleinBundle:Default:index.html.twig', array('name' => $name));
    }
}
