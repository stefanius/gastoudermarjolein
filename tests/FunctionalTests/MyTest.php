<?php

namespace Tests\FunctionalTests;

class MyTest extends FunctionalTest
{
    /**
     * @param $url
     * @param $h1
     *
     * @dataProvider pagesProvider
     */
    public function testPages($url, $h1)
    {
        $this->visit($url)
            ->mustContainH1($h1);
    }

    public function pagesProvider()
    {
        return [
            ['nieuws', 'Nieuws'],
            ['even-voorstellen', 'Even voorstellen'],
            ['openingstijden', 'Openingstijden'],
            ['dagindeling', 'Dagindeling'],
            ['/', 'Gastouder Marjolein in Dordrecht'],
        ];
    }
}