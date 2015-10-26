<?php

namespace Stef\GastouderMarjoleinBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class NewsController extends BaseController
{
    /**
     * Show a news entry.
     */
    public function showAction(Request $request, $slug)
    {
        $news = $this->getNewsManager()->read($slug);

        if (!$news) {
            throw $this->createNotFoundException('Unable to find News post.');
        }

        return $this->render('StefGastouderMarjoleinBundle:News:show.html.twig', array(
            'page' => $news,
        ), null, $request);
    }

    /**
     * Show the news archive.
     */
    public function showMainNewsPageAction(Request $request)
    {
        /*
         * @var EntityManager
         */
        $em = $this->getDoctrine()->getManager();

        /*
         * @var QueryBuilder
         */
        $qb = $em->getRepository('StefSimpleCmsBundle:News')->createQueryBuilder('n');

        $qb->select('n')
            ->setMaxResults(20)
            ->orderBy('n.id', 'DESC');

        $newsitems = $qb->getQuery()->getResult();

        $page['title'] = 'Nieuws overzicht';

        return $this->render('StefGastouderMarjoleinBundle:News:index.html.twig', array(
            'newsitems' => $newsitems,
            'page'      => $page,
        ), null, $request);
    }
}
