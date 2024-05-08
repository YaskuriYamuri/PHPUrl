<?php

namespace Yaskuriyamuri\Phpurl;

final class UrlComponentData implements Interfaces\IUrlComponentData
{
    /**
     * @param string $host
     * @param string|null $path
     * @param int $port
     * @param string|array|null $query array or string with format arg=value
     * @param string|null $scheme
     * @param string|null $fragment
     * @param string|null $user
     * @param string|null $pass
     * @return void
     */   function __construct($host, $port, $scheme = null, $path = null, $query = [], $fragment = null, $user = null, $pass = null)
    {
        $this
            ->SetHost($host)
            ->SetPath($path)
            ->SetPort($port)
            ->SetQuery($query)
            ->SetScheme($scheme)
            ->SetFragment($fragment)
            ->SetUser($user)
            ->SetPass($pass);
    }
    function getHost()
    {
        return $this->host;
    }
    function getPath()
    {
        return $this->path;
    }
    function getPort()
    {
        return $this->port;
    }
    function getQuery()
    {
        return $this->query;
    }
    function getScheme()
    {
        return $this->scheme;
    }
    function getFragment()
    {
        return $this->fragment;
    }
    function getUser()
    {
        return $this->user;
    }
    function getPass()
    {
        return $this->pass;
    }
    function SetHost($value)
    {
        if (is_null($value)) throw new \Yaskuriyamuri\Phpurl\Exceptions\UrlComponentDataException;
        $this->host = $value;
        return $this;
    }
    function SetPath($value)
    {
        if (\is_null($value)) $value = "/";
        if (\substr($value, 0, 1) != "/") throw new \Yaskuriyamuri\Phpurl\Exceptions\UrlComponentDataException("Invalid format value `path`, prefix must `/`");
        $this->path = $value;
        return $this;
    }
    function SetPort($value)
    {
        if (is_null($value)) $value = 80;
        $this->port = $value;
        return $this;
    }
    function SetQuery($value)
    {
        if (is_null($value)) $value = "";
        if(is_array($value)){
            $value=http_build_query($value);
        }
        if (!empty($value)) $value = "?{$value}";
        $this->query = $value;
        return $this;
    }
    function SetScheme($value)
    {
        if (is_null($value)) $value = "http";
        $this->scheme = $value;
        return $this;
    }
    function SetFragment($value)
    {
        $value = !empty($value) ? "#{$value}" : $value;
        $this->fragment = $value;
        return $this;
    }
    function SetUser($value)
    {
        $this->user = $value;
        return $this;
    }
    function SetPass($value)
    {
        $this->pass = $value;
        return $this;
    }
    function __toString()
    {
        $auth = !is_null($this->getUser()) ? implode(":", [$this->user, $this->pass]) . "@" : ""; 
        return sprintf("%s://%s%s:%d%s%s%s", $this->getScheme(), $auth, $this->getHost(), $this->getPort(), $this->getPath(), $this->getQuery(), $this->getFragment());
    }
    function __serialize()
    {
        return  [
            "scheme" => $this->scheme,
            "host" => $this->host,
            "port" => $this->port,
            "user" => $this->user,
            "pass" => $this->pass,
            "path" => $this->path,
            "query" => $this->query,
            "fragment" => $this->fragment,
        ];
    }
    function __unserialize($data)
    {
        $this->scheme = $data["scheme"];
        $this->host = $data["host"];
        $this->port = $data["port"];
        $this->user = $data["user"];
        $this->pass = $data["pass"];
        $this->path = $data["path"];
        $this->query = $data["query"];
        $this->fragment = $data["fragment"];
    }
}
