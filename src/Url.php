<?php

namespace Yaskuriyamuri\Phpurl;

final class Url implements Interfaces\IUrl
{
    /**
     * Initial kelas 
     * 
     * @param string|Interfaces\IUrlBase|Interfaces\IUrlComponentData $url_data
     * @return void
     */ function __construct($url_data)
    {
        $this->{"__url_data"} = strval($url_data);
    }

    function getScheme()
    {
        return strval($this->getComponent(\PHP_URL_SCHEME));
    }
    function getUser()
    {
        return strval($this->getComponent(\PHP_URL_USER));
    }
    function getPass()
    {
        return strval($this->getComponent(\PHP_URL_PASS));
    }
    function getHost()
    {
        return strval($this->getComponent(\PHP_URL_HOST));
    }
    function getPort()
    {
        return intval($this->getComponent(\PHP_URL_PORT));
    }
    function getPath()
    {
        return strval($this->getComponent(\PHP_URL_PATH));
    }
    function getQuery()
    {
        return strval($this->getComponent(\PHP_URL_QUERY));
    }
    function getFragment()
    {
        return strval($this->getComponent(\PHP_URL_FRAGMENT));
    }
    function getComponent($component)
    {
        return \parse_url($this->{"__url_data"}, $component);
    }

    function __toString()
    {
        return strval($this->{"__url_data"});
    }

    function __serialize()
    {
        return [
            \PHP_URL_SCHEME => $this->getScheme(),
            \PHP_URL_USER => $this->getUser(),
            \PHP_URL_PASS => $this->getPass(),
            \PHP_URL_HOST => $this->getHost(),
            \PHP_URL_PORT => $this->getPort(),
            \PHP_URL_PATH => $this->getPath(),
            \PHP_URL_QUERY => $this->getQuery(),
            \PHP_URL_FRAGMENT => $this->getFragment(),
        ];
    }

    function __unserialize($data)
    {
        $this->__construct(new UrlComponentData($data[\PHP_URL_HOST], $data[\PHP_URL_PORT], $data[\PHP_URL_SCHEME], $data[\PHP_URL_PATH], $data[\PHP_URL_QUERY], $data[\PHP_URL_FRAGMENT], $data[\PHP_URL_USER], $data[\PHP_URL_PASS]));
    }
}
