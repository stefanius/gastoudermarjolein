<?php

namespace Stef\GastouderMarjoleinBundle\Controller;

use Stef\SimpleCmsBundle\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        $page = new Page();
        $page->setDescription('Gastouder Marjolein heeft een ruime ervaring met oppassen in Dodrecht. Als u een goede gastouder in Dordrecht zoekt, stop met zoeken!');
        $page->setTitle('Gastouder Marjolein Dordrecht');

        return $this->render('StefGastouderMarjoleinBundle:Pages:index.html.twig', [
            'page' => $page
        ]);
    }
}
