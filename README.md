# PHP Url

A class that represents the native function of php [parse_url](https://www.php.net/manual/en/function.parse-url.php) as an object-oriented programming class

## Installation

Use the terminal where it is in the active project directory and run the terminal command <code>composer require yaskuriyamuri/phpurl</code> to install the application to your project. Make sure your device has composer installed.

## Usage

### Class *Url*
```php
require 'vendor/autoload.php';

$url = new Url("http://hostname:7070/path");
echo strval($url); # Output http://hostname:7070/path 
 
```

#### Use String
|Name|Return|Description|
|---|---|---|
|getScheme()|string|Output the scheme of the url parsed (http, https etc).|
|getUser()|string|Outputs the user of the URL parsed.|
|getPass()|string|Outputs the password of the URL parsed.|
|getHost()|string|Outputs the hostname of the URL parsed.|
|getPort()|int|Outputs the port of the URL parsed.|
|getPath()|string|Outputs the path of the URL parsed.|
|getQuery()|string|Outputs the query string of the URL parsed.|
|getFragment()|string|Outputs the fragment (string after the hashmark #) of the URL parsed| 

#### Use Class *UrlBase*
```php
require 'vendor/autoload.php'; 

$url = new Url(new UrlBase("http://hostname:7171", "/path"));
echo strval($url); # Output http://hostname:7171/path  
 
```

|Name|Return|Description|
|---|---|---|
|getBaseUrl()|string|Get baseurl of url|  
|getEndPoint()|string|Get end point of url|  


|Name|Return|Parameter|Description|
|---|---|---|---|
|setBaseUrl($value) |void|<ol><li>$value as sring</li></ol>|Set baseurl of url|  
|setEndPoint($value) |void|<ol><li>$value as sring</li></ol>|Set end point of url| 
 

#### Use Class *UrlComponentData*

```php
require 'vendor/autoload.php'; 

$url = new Url(new UrlComponentData("hostname", 7272, "http", "/path"));
echo strval($url); # Output http://hostname:7272/path; 
 
```
|Name|Return|Description|
|---|---|---|
|getHost()|string|Outputs the hostname of the URL parsed.|
|getPath()|string|Outputs the path of the URL parsed.|
|getPort()|integer|Outputs the port of the URL parsed.|
|getQuery()|string|Outputs the query string of the URL parsed.|
|getScheme()|string|Output the scheme of the url parsed (http, https etc).|
|getFragment()|string|Outputs the fragment (string after the hashmark #) of the URL parsed.|
|getUser()|string|Outputs the user of the URL parsed.|
|getPass()|string|Outputs the password of the URL parsed.|


|Name|Return|Parameter|Description|
|---|---|---|---|
|SetHost($value) |void|$value as sring|Set the hostname of the URL.|
|SetPath($value) |void|$value as sring|Set the path of the URL.|
|SetPort($value) |void|$value as int|Set the port of the URL.|
|SetQuery($value) |void|$value as sring or array|Set the query string of the URL parsed.|
|SetScheme($value) |void|$value as sring|Set the scheme of the url parsed (http, https etc).|
|SetFragment($value) |void|$value as sring|Set the fragment (string after the hashmark #) of the URL parsed.|
|SetUser($value) |void|$value as sring|Set the user of the URL parsed.|
|SetPass($value) |void|$value as sring|Set the password of the URL parsed.|

## Contributing

Pull requests are welcome. For major changes, please open an issue first
to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
PHP Url is release under [GNU GPLv3](https://choosealicense.com/licenses/gpl-3.0/) license.