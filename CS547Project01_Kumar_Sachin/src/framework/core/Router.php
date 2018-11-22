<?php
namespace AztecGameStudios\framework\core;

class Router
{

    public function __construct()
    {

    }

    // Autoloading
    public static function autoload()
    {
        spl_autoload_register(array(__CLASS__, 'load'));
    }

    // Define a custom load method
    public static function load($classname)
    {
        // spl_autoload_register('autoloader');

        // Below autoload app’s controller and model classes
        if (substr($classname, -10) == "Controller") {
            // Controller

            // In case need to find the filename but didn't work well
            // $lastSlash = strpos($classname, '\\') + 1;
            // $classname = substr($classname, $lastSlash);
            // $directory = str_replace('\\', '/', $classname);
            // $filename = __DIR__ . '/' . $directory . '.php';

            // IMP : For loading the class we need directory path whereas for creating the instance we need Namesapce path
            // full directroy path for laoding the class
            // require_once CONTROLLER_PATH . "$classname.php";   This won't work as classsname has Namespace in it.
            require_once CONTROLLER_PATH . ucfirst(CONTROLLER) . "Controller.php";
        } elseif (substr($classname, -5) == "Model") {
            // Model, if required in future
            require_once MODEL_PATH . "$classname.php";
        }
    }

}
