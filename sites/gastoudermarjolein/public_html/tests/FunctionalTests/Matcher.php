<?php

namespace Tests\FunctionalTests;

class Matcher
{
    /**
     * @var \PHPUnit_Framework_TestCase
     */
    protected $phpUnit;

    function __construct(\PHPUnit_Framework_TestCase $phpUnit)
    {
        $this->phpUnit = $phpUnit;
    }

    /**
     * Test if a haystack (text) contains the needle.
     *
     * @param $haystack
     * @param $needle
     */
    public function shouldContain($haystack, $needle)
    {
        $pattern = $this->formatPattern($needle);

        $this->phpUnit->assertRegExp("/$pattern/i", $haystack);
    }

    /**
     * Test if a haystack (text) does not contains the needle.
     *
     * @param $haystack
     * @param $needle
     */
    public function shouldNotContain($haystack, $needle)
    {
        $pattern = $this->formatPattern($needle);

        $this->phpUnit->assertNotRegExp("/$pattern/i", $haystack);
    }

    /**
     * Format the regex pattern.
     *
     * @param string $needle
     *
     * @return string
     */
    protected function formatPattern($needle)
    {
        $rawPattern = preg_quote($needle, '/');

        $escapedPattern = preg_quote($needle, '/'); //write Escape function.

        $pattern = $rawPattern == $escapedPattern
            ? $rawPattern : "({$rawPattern}|{$escapedPattern})";

        return $pattern;
    }
}