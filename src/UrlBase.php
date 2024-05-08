<?php

namespace Yaskuriyamuri\Phpurl;

final class UrlBase implements Interfaces\IUrlBase
{
    function __construct($base_url, $end_point)
    {
        $this->setBaseUrl($base_url)->setEndPoint($end_point);
    }

    function getBaseUrl()
    {
        return $this->base_url;
    }
    function getEndPoint()
    {
        return $this->end_point;
    }

    function setBaseUrl($value)
    {
        $this->base_url = $value;
        return $this;
    }
    function setEndPoint($value)
    {
        if (\is_null($value)) $value = "/";
        if (\substr($value, 0, 1) != "/") throw new \Yaskuriyamuri\Phpurl\Exceptions\UrlBaseException("Invalid format value `end_point`, prefix must `/`");
        $this->end_point = $value;
        return $this;
    }

    function __toString()
    {
        return sprintf("%s%s", $this->base_url, $this->end_point);
    }

    function __serialize()
    {
        return ["base_url" => $this->base_url, "end_point" => $this->end_point];
    }

    function __unserialize($data)
    {
        $this->setBaseUrl($data["base_url"])->setEndPoint($data["end_point"]);
    }
}
