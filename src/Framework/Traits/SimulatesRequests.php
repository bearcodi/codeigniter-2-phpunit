<?php

namespace Bearcodi\CIPHPUnit\Framework\Traits;

use Bearcodi\CIPHPUnit\Framework\Request;

trait SimulatesRequests
{
    public function get($path)
    {
        return (new Request)->parse($path)->get();
    }
    
    public function post($path, $params = [])
    {
        return  (new Request)->parse($path)->post($params);
    }
}