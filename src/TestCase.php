<?php

namespace Bearcodi\CIPHPUnit;

use Whoops\Run as Whoops;
use Whoops\Handler\PlainTextHandler as CliHandler;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Bearcodi\CIPHPUnit\Framework\Traits\SimulatesRequests;

class TestCase extends OrchestraTestCase
{
    use SimulatesRequests;
    
    public static function setUpBeforeClass()
    {
        (new Whoops)->pushHandler(new CliHandler)->register();
        
        spl_autoload_register('autoloadCiSubfolderControllers');
    }
    
    public static function tearDownAfterClass()
    {
        spl_autoload_unregister('autoloadCiSubfolderControllers');
    }
    
}

