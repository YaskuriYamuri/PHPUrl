<?php

namespace Yaskuriyamuri\Phpurl\Interfaces;

/** 
 * @property string $host
 * @property string|null $path
 * @property int $port
 * @property string|array|null $query
 * @property string|null $scheme
 * @property string|null $fragment
 * @property string|null $user
 * @property string|null $pass 
 * 
 * @throws \Yaskuriyamuri\Phpurl\Exceptions\UrlComponentDataException
 * */ interface IUrlComponentData
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
     * @return void */ function __construct($host, $port, $scheme = null, $path = null, $query = [], $fragment = null, $user = null, $pass = null);

    /** @return string */ function getHost();
    /** @return string|null */ function getPath();
    /** @return int */ function getPort();
    /** @return string|null */ function getQuery();
    /** @return string|null */ function getScheme();
    /** @return string|null */ function getFragment();
    /** @return string|null */ function getUser();
    /** @return string|null */ function getPass();


    /** @param string $value
     * @return self */ function SetHost($value);

    /** @param string|null $value
     * @return self */ function SetPath($value);

    /** @param int|null $value
     * @return self */ function SetPort($value);

    /** @param string|array|null $value
     * @return self */ function SetQuery($value);

    /** @param string|null $value
     * @return self */ function SetScheme($value);

    /** @param string|null $value
     * @return self */ function SetFragment($value);

    /** @param string|null $value
     * @return self */ function SetUser($value);

    /** @param string|null $value
     * @return self */ function SetPass($value);



    /** Get base url 
     * @return string */ function __toString();
    /** object to array 
     * @return array */ function __serialize();
    /** array to object 
     * @param array $data
     * @return void */ function __unserialize($data);
}
