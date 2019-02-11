<?php

namespace Bearcodi\CIPHPUnit;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Bearcodi\CIPHPUnit\Framework\Traits\SimulatesRequests;

class TestCase extends PHPUnitTestCase
{
    use SimulatesRequests;
    
    public static function setUpBeforeClass()
    {
        spl_autoload_register('autoloadCiSubfolderControllers');
    }
    
    public static function tearDownAfterClass()
    {
        spl_autoload_unregister('autoloadCiSubfolderControllers');
    }
}

