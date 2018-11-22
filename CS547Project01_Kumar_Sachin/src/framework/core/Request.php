<?php
namespace AztecGameStudios\framework\core;

class Request
{
    const GET = "GET";
    const POST = "POST";

    private $domain;
    private $path;
    private $http_method;

    public function __construct()
    {
        $this->domain = $_SERVER['HTTP_HOST'];
        $this->path = $_SERVER['REQUEST_URI'];
        $this->http_method = $_SERVER['REQUEST_METHOD'];
    }

    public function processRequest_old()
    {
        // echo "Server Path </br>";
        // print_r($_SERVER);

        if (isset($_SERVER['PATH_INFO'])) {

            // print_r("<br/><br/><br/>################  PATH  #############################<br/>" . $this->path);
            // print_r("<br/>#################  REQUEST_METHOD  ###################<br/>" . $this->http_method);
            // print_r("<br/><br/>#################  Path Split  ###################<br/><br/>");

            // Then we split the path to get the corresponding controller and method to work with
            // echo "<br/><br/>Path Split<br/>";

            $path_split = explode('/', ltrim($this->path));
            // print_r($path_split);
            // var_dump($path_split);
            // Then we have our controller name has [1] method name as [2] and id as [3]

            define("HTTP_METHOD", $this->http_method);

            if (isset($path_split[1])) {
                define("CONTROLLER", $path_split[1]);
            }
            if (isset($path_split[2])) {
                define("ACTION", $path_split[2]);
            }
            if (isset($path_split[3])) {
                define("PARAM", $path_split[3]);
            }

        } else {
            $path_split = '/';
        }
    }

    public function processRequest()
    {

        // I was using REST endpoints convetntions. Looks likefollowing that approch, its difficult to load public assets like images,css, js, etc which doesn't need any interceptor controller.
        // Below stragey looks better now
        // Define platform, controller, action, for example:
        // URL :  index.php?p=admin&c=Goods&a=add
        // define("PLATFORM", isset($_REQUEST['p']) ? $_REQUEST['p'] : 'home');
        // define("CONTROLLER", isset($_REQUEST['c']) ? $_REQUEST['c'] : 'home');
        // define("ACTION", isset($_REQUEST['a']) ? $_REQUEST['a'] : 'load');
        // Again we should set the default values (like i did home above). This will again create problems access the publc assets.

        if (isset($_REQUEST['c'])) {
            define("CONTROLLER", $_REQUEST['c']);
        }
        if (isset($_REQUEST['a'])) {
            define("ACTION", $_REQUEST['a']);
        }

    }

    // define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
    // define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

}
