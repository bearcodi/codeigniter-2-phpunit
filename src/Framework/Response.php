<?php

namespace Bearcodi\CIPHPUnit\Framework;

use PHPUnit\Framework\Assert;

class Response extends Assert
{
    protected $content;
    protected $statusCode;

    public function __construct($content, $statusCode = 200)
    {
        $this->content = $content;
        $this->statusCode = $statusCode;
    }

    public function assertSee($value)
    {
        $this->assertContains($value, $this->content);

        return $this;
    }
    
    public function assertNotSee($value)
    {
        $this->assertNotContains($value, $this->content);

        return $this;
    }
    
    public function assertSeeText($value)
    {
        $this->assertContains($value, strip_tags($this->content));

        return $this;
    }
    
    public function assertNotSeeText($value)
    {
        $this->assertNotContains($value, strip_tags($this->content));

        return $this;
    }

    public function assertSuccess()
    {
        $this->assertEquals(200, $this->statusCode);
        return $this;
    }
}