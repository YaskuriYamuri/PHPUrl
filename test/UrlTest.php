<?php

namespace Plninsurance\PhpurlTest;

use PHPUnit\Framework\TestCase;
use Yaskuriyamuri\Phpurl\Url;
use Yaskuriyamuri\Phpurl\UrlBase;
use Yaskuriyamuri\Phpurl\UrlComponentData;

final class UrlTest extends TestCase
{
    final function testFullUrl()
    {
        $url = new Url("http://hostname:7070/path");
        $this->assertEquals("http://hostname:7070/path", strval($url));

        $url = new Url(new UrlBase("http://hostname:7171", "/path"));
        $this->assertEquals("http://hostname:7171/path", strval($url));

        $url = new Url(new UrlComponentData("hostname", 7272, "http", "/path"));
        $this->assertEquals("http://hostname:7272/path", strval($url));
    }
}
