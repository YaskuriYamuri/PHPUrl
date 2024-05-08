<?php

namespace Yaskuriyamuri\Phpurl\Interfaces;

/**
 * Interface untuk Url dengan Base url dan end point
 * 
 * @property string $base_url
 * @property string $end_point
 * 
 * @throws \Yaskuriyamuri\Phpurl\Exceptions\UrlBaseException
 */
interface IUrlBase
{ 
    /**
     * initial class
     *
     * @param string $base_url
     * @param string $end_point
     */ function __construct($base_url, $end_point);
    /**
     * Get base url
     *
     * @return string
     */ function getBaseUrl();
    /**
     * Get end point url
     *
     * @return string
     */ function getEndPoint();

    /**
     * Base url
     *
     * @param string $value
     * @return self
     */ function setBaseUrl($value);
    /**
     * end point 
     *
     * @param string $value
     * @return self
     */ function setEndPoint($value);

     
    /**
     * Get base url
     *
     * @return string
     */ function __toString();
    /**
     * object to array
     *
     * @return array
     */ function __serialize();
    /**
     * array to object
     *
     * @param array $data
     * @return void
     */ function __unserialize(  $data);
}
