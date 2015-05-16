<?php

namespace Stef\GastouderMarjoleinBundle\Controller;

use Stef\SimpleCmsBundle\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        $page = new Page();
        $page->setDescription('Het heden en verleden komen samen op DagVanDeWeek! Elke dag een nieuwe dag. Bekijk onze kalenders en laat het verleden naar vandaag komen!');
        $page->setTitle('Gastouder Marjolein Dordrecht');

        return $this->render('StefGastouderMarjoleinBundle:Default:index.html.twig', [
            'page' => $page
        ]);
    }
}
