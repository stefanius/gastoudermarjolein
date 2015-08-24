<?php

namespace Stef\GastouderMarjoleinBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Routing\Router;

class BaseController extends Controller
{
    /**
     * @return Router
     */
    protected function getRouter()
    {
        return $this->get('router');
    }
}