<?php
namespace AztecGameStudios\framework\core;

/**
 * To dod : This is singleton class to load all of the constant only onces.
 *
 */

final class Initialization
{

    // private static $obj;

    /**
     * Private constructor so nobody else can instantiate it
     *
     */
    public function __construct()
    {
    }

    /**
     * Call this method to get singleton
     *
     * @return Initialization
     */

    public static function getInstance()
    {
        // if (self::$obj == null) {
        //     self::$obj = new Initialization();
        //     self::$obj.loadConstants();
        // }
        // return self::$obj;

        static $obj = null;
        if ($obj === null) {
            $obj = new Initialization();
            $obj::loadConstants();
        }
        return $obj;

    }

    // Initialization or loading all constants
    public static function loadConstants()
    {

        // Define path constants

        define("DS", DIRECTORY_SEPARATOR);
        // define("ROOT", getcwd() . DS);
        define("ROOT", dirname(dirname(__DIR__)) . DS);
        define("SRC_DIR", ROOT);

        // Using ROOT dir
        define("APP_PATH", ROOT . 'application' . DS);
        define("FRAMEWORK_PATH", ROOT . "framework" . DS);
        define("PUBLIC_PATH", ROOT . "public" . DS);

        // Using APP_PATH dir
        define("CONFIG_PATH", APP_PATH . "config" . DS);
        define("CONTROLLER_PATH", APP_PATH . "controller" . DS);
        define("MODEL_PATH", APP_PATH . "model" . DS);
        define("VIEW_PATH", APP_PATH . "view" . DS);

        // Using FRAMEWORK_PATH dir
        define("CORE_PATH", FRAMEWORK_PATH . "core" . DS);
        define('DB_PATH', FRAMEWORK_PATH . "database" . DS);
        define("LIB_PATH", FRAMEWORK_PATH . "libraries" . DS);
        define("HELPER_PATH", FRAMEWORK_PATH . "helpers" . DS);

        // define("UPLOAD_PATH", PUBLIC_PATH . "uploads" . DS);

 

        // todo if required in future:
        // define("CURR_VIEW_PATH", VIEW_PATH . CONTROLLER . DS);
        
        // Load core classes
        // require CORE_PATH . "Controller.php";
        // require CORE_PATH . "Loader.php";
        // require DB_PATH . "Mysql.php";
        // require CORE_PATH . "Model.php";

        // Load configuration file
        $GLOBALS['config'] = include CONFIG_PATH . "config.php";

    }

}
