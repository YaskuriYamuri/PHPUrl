<?php

namespace Plninsurance\PhpurlTest;

use PHPUnit\Framework\TestCase;
use Yaskuriyamuri\Phpurl\UrlComponentData;

final class UrlComponentDataTest extends TestCase
{
    final function testFullUrl()
    {
        $url = new UrlComponentData("hostname", 9090, "http", "/path", "arg=value", "anchor", "username", "password");
        $this->assertEquals("http://username:password@hostname:9090/path?arg=value#anchor",strval($url));

        $url = new UrlComponentData("hostname", 9090, "http", "/path", ["arg0" => "value0", "arg1" => "value1"], "anchor", "username", "password");
        $this->assertEquals("http://username:password@hostname:9090/path?arg0=value0&arg1=value1#anchor",strval($url));
    }
}
