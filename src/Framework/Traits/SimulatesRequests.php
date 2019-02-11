<?php

namespace Bearcodi\CIPHPUnit\Framework\Traits;

use Bearcodi\CIPHPUnit\Framework\Request;

trait SimulatesRequests
{
    protected function get($path)
    {
        return (new Request)->parse($path)->get();
    }
    
    protected function post($path, $params = [])
    {
        return  (new Request)->parse($path)->post($params);
    }
}