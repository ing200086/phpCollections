<?php

namespace pUoM\Tests;

/**
 * TestCase
 */
abstract class TestCase extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        \Mockery::close();
    }
}
