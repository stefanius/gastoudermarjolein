<?php

namespace Stef\GastouderMarjoleinBundle\Controller;

use Stef\SimpleCmsBundle\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StaticPagesController extends Controller
{
    public function renderAction($template, $title, $description)
    {
        $page = new Page();
        $page->setDescription($description);
        $page->setTitle($title);

        return $this->render($template, [
            'page' => $page
        ]);
    }
}
