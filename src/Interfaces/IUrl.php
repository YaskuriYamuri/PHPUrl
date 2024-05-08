<?php

namespace Yaskuriyamuri\Phpurl\Interfaces;

/** 
 * @property string $__url_data
 *  
 * @throws \Yaskuriyamuri\Phpurl\Exceptions\UrlException
 */
interface IUrl
{
    /**
     * Initial kelas 
     * 
     * @param string|IUrlBase|IUrlComponentData $url_data
     * @return void
     */ function __construct($url_data);
    /** @return string */ function  getScheme();
    /** @return string */ function  getUser();
    /** @return string */ function  getPass();
    /** @return string */ function  getHost();
    /** @return int */ function  getPort();
    /** @return string */ function  getPath();
    /** @return string */ function  getQuery();
    /** @return string */ function  getFragment();
    /** @param null|int $component 
     * @return mixed */ function getComponent($component);

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
     */ function __unserialize($data);
}
