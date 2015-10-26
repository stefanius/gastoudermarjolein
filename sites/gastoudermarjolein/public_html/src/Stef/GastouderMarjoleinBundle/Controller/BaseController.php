<?php

namespace Stef\GastouderMarjoleinBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Stef\SimpleCmsBundle\Manager\NewsManager;

class BaseController extends Controller
{
    /**
     * @return Router
     */
    protected function getRouter()
    {
        return $this->get('router');
    }

    /**
     * @return NewsManager
     */
    protected function getNewsManager()
    {
        return $this->get('stef_simple_cms.news_manager');
    }
}