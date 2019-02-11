<?php

namespace Bearcodi\CIPHPUnit\Framework;

use PHPUnit\Framework\Assert;

class Request extends Assert
{
    private $CI;
    
    protected $basePath;
    
    protected $controller;
    
    protected $action;
    
    protected $requestParams;
    
    public function __construct()
    {
        $this->CI =& \get_instance();
    }
    
    public function parse($basePath)
    {
        $this->basePath = $basePath;
        
        $basePathParts = explode('/', ltrim($this->basePath, '/'));
        
        $this->controller = array_shift($basePathParts);
        if (!class_exists($this->controller)) {
            $this->controller = array_shift($basePathParts);
        }
        $this->action = count($basePathParts) ? array_shift($basePathParts) : 'index';
        $this->requestParams = $basePathParts;
        
        return $this;
    }
    
    public function get()
    {
        $_GET = array_merge($_GET, $this->requestParams);
        
        return $this->resolveController();
    }
    
    public function post($params = [])
    {
        $_POST = array_merge($_POST, $this->requestParams, $params);
        
        return $this->resolveController();
    }
    
    protected function resolveController()
    {
        
        $this->CI = new $this->controller;
        
        if (! method_exists($this->CI, $this->action)) {
            show_404("[404] The following path could not be found: $this->basePath");
        }
        
        ob_start();
        $this->CI->{$this->action}(...$this->requestParams);
        $response = ob_get_contents();
        ob_end_clean();
        $statusCode = 200;
        
        
        return new Response($response, $statusCode);
    }
}