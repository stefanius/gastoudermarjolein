<?php

namespace Stef\GastouderMarjoleinBundle\Controller;



use Symfony\Component\HttpFoundation\Response;

class SitemapController extends BaseController
{
    public function pagesSitemapAction()
    {
        $xml = '';
        $router = $this->getRouter();

        foreach ($router->getRouteCollection()->all() as $key => $route) {
            if (strpos($key, 'stef_gastouder_marjolein_page_') !== false) {
                $xml .= '<url>
                            <loc>
                                http://gastoudermarjolein.nl' . $route->getPath() . '
                            </loc>
                            <changefreq>daily</changefreq>
                            <priority>1</priority>
                        </url>
                    ';
            }
        }

        $sitemap  = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . $xml . '</urlset>';
        $response = new Response($sitemap);
        $response->headers->set('Content-Type', 'xml');

        return $response;
    }
}

