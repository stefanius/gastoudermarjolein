<?php

namespace Stef\DagVanDeWeekBundle\Controller;

use Ivory\GoogleMap\Map;
use Stef\DagVanDeWeekBundle\BreadcrumbGenerator\Generator;
use Stef\DagVanDeWeekBundle\BreadcrumbGenerator\TitleBuilderInterface;
use Stef\DagVanDeWeekBundle\Manager\CalendarYearManager;
use Stef\DagVanDeWeekBundle\Manager\HistoryManager;
use Stef\DagVanDeWeekBundle\Manager\HistoryYearManager;
use Stef\DagVanDeWeekBundle\Manager\WeekHeroManager;
use Stef\SimpleCmsBundle\Entity\AbstractCmsContent;
use Stef\SimpleCmsBundle\KeyValueParser\Parser;
use Stef\SimpleCmsBundle\Manager\DictionaryManager;
use Stef\SimpleCmsBundle\Manager\NewsManager;
use Stef\SimpleCmsBundle\Manager\PageManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WhiteOctober\BreadcrumbsBundle\Model\Breadcrumbs;

class BaseController extends Controller
{
    protected function getEntityManager()
    {
        return $this->getDoctrine()->getManager();
    }

    protected function getRepository($repository)
    {
        $em = $this->getEntityManager();

        return $em->getRepository($repository);
    }

    /**
     * @return DictionaryManager
     */
    protected function getDictionaryManager()
    {
        return $this->get('stef_simple_cms.dictionary_manager');
    }

    /**
     * @return PageManager
     */
    protected function getPageManager()
    {
        return $this->get('stef_simple_cms.page_manager');
    }

    /**
     * @return NewsManager
     */
    protected function getNewsManager()
    {
        return $this->get('stef_simple_cms.news_manager');
    }

    /**
     * @return CalendarYearManager
     */
    protected function getCalendarYearManager()
    {
        return $this->get('stef_simple_cms.calendar_year_manager');
    }

    /**
     * @return HistoryYearManager
     */
    protected function getHistoryYearManager()
    {
        return $this->get('stef_simple_cms.history_year_manager');
    }

    /**
     * @return HistoryManager
     */
    protected function getHistoryManager()
    {
        return $this->get('stef_simple_cms.history_manager');
    }

    /**
     * @return WeekHeroManager
     */
    protected function getWeekHeroManager()
    {
        return $this->get('stef_simple_cms.weekhero_manager');
    }

    /**
     * @return Parser
     */
    protected function getKeyValueParser()
    {
        return $this->get('stef_simple_cms.key_value_parser');
    }

    /**
     * @return Map
     */
    protected function getIvoryGoogleMap()
    {
        return $this->get('ivory_google_map.map');
    }

    protected function isAuthenticatedFully()
    {
        return $this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY');
    }

    /**
     * @return Breadcrumbs
     */
    protected function getWhiteOctoberBreadcrumbs()
    {
        return $this->get("white_october_breadcrumbs");
    }

    /**
     * {@inheritdoc}
     */
    public function render($view, array $parameters = array(), Response $response = null, Request $request = null, TitleBuilderInterface $breadcrumbTitleBuilder = null)
    {

        if ($request !== null && $breadcrumbTitleBuilder !== null) {
            $page = null;

            if (array_key_exists('page', $parameters) && $parameters['page'] instanceof AbstractCmsContent) {
                $page = $parameters['page'];
            }

            $this->generateBreadCrumbs($request, $breadcrumbTitleBuilder, $page);
        }

        return parent::render($view, $parameters, $response);
    }

    /**
     * @param Request $request
     * @param TitleBuilderInterface $breadcrumbTitleBuilder
     * @param AbstractCmsContent $page
     */
    protected function generateBreadCrumbs(Request $request, TitleBuilderInterface $breadcrumbTitleBuilder, AbstractCmsContent $page = null)
    {
        $generator = new Generator($this->getWhiteOctoberBreadcrumbs());
        $generator->setTitleBuilder($breadcrumbTitleBuilder);
        $crumbs = $generator->generate($request, $page);

        $breadcrumbs = $this->getWhiteOctoberBreadcrumbs();

        foreach ($crumbs as $crumb) {
            $breadcrumbs->addItem($crumb['title'], $crumb['link']);
        }
    }
}