<?php

namespace Plninsurance\PhpurlTest;

use PHPUnit\Framework\TestCase;
use Yaskuriyamuri\Phpurl\UrlBase;

final class UrlBaseTest extends TestCase
{
    final function testFullUrl()
    {
        $url = new UrlBase("http://hostname:8080", "/path");
        $this->assertEquals("http://hostname:8080/path",strval($url));

     }
}
