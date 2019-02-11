<?php

namespace Bearcodi\CIPHPUnit\Framework;

abstract class Bootstrap {
    public static function run($testBase)
    {
        $appPath = realpath($testBase . '/../public/index.php');
        
        if (!$appPath) {
            $appPath = realpath($testBase . '/../index.php');
        }
        
        if (!$appPath) {
            throw new \Exception('Unable to locate CodeIgniter index.php file!');
        }
        
        require_once($appPath);
    }
}