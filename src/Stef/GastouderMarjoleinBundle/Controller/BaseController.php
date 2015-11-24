<?php

namespace Stef\GastouderMarjoleinBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Stef\SimpleCmsBundle\Manager\NewsManager;
use Stef\GastouderMarjoleinBundle\Manager\ContactManager;

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

    /**
     * @return ContactManager
     */
    protected function getContactManager()
    {
        return $this->get('stef_simple_cms.contact_manager');
    }
}