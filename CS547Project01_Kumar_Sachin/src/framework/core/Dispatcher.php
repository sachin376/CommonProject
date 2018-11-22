<?php
namespace AztecGameStudios\framework\core;

class Dispatcher
{

    public function __construct()
    {

    }

    // Routing and dispatching
    public static function dispatch()
    {
        // Instantiate the controller class and call its action method

        //Imp :  For loading the class we need directory path whereas for creating the instance we need Namesapce path
        // Namespace for instantiatng the class
        // https://blog.lysender.com/2015/07/php-instantiate-a-class-from-a-string-with-namespace/

        // None of the below combination worked. Only one option worked as used.
        // $controller_name = 'AztecGameStudios\\application\\controller\\' . ucfirst(CONTROLLER) . 'Controller.php';
        // $controller_name = ucfirst(CONTROLLER) . 'Controller';
        // $controller_name = ucfirst(CONTROLLER) . 'Controller.php';
        // $controller_name = 'AztecGameStudios\application\controller\\' . ucfirst(CONTROLLER) . 'Controller';
        // $controller_name = 'AztecGameStudios\application\controller\\' . ucfirst(CONTROLLER) . 'Controller.php';
        // $controller_name = '/Users/sk/git_sdsu/script_lan/CS547Project01_Kumar_Sachin/src/application/controller/' . ucfirst(CONTROLLER) . 'Controller';
        // $controller_name = '/Users/sk/git_sdsu/script_lan/CS547Project01_Kumar_Sachin/src/application/controller/' . ucfirst(CONTROLLER) . 'Controller.php';

        if (defined('CONTROLLER') && defined('ACTION')) {

            $controller_name = 'AztecGameStudios\\application\\controller\\' . ucfirst(CONTROLLER) . 'Controller';
            $controller = new $controller_name;

            // Below fucntion giving Error, so invoked method directly without using this method. Error: call_user_func_array() expects exactly 2 parameters, 3 given
            // call_user_func_array($controller, $action_name, PARAM);

            //About to leave frontcontroller and invoking the appropriate action in controller class
            try {
                $action_name = strtolower(ACTION);
                $controller->$action_name();
            } catch (MyCustomExcetion $ex) {
                $ex . setMessage("This Action is incorrect for this URL Controller. Please correct the URL");
                print("Handle the exeption in appropirate way." . $ex . getMyMessage());
            }
        } else {

            // print(" </br> No Action defined for this URL Controller. Please correct the URL</br>");
            // These HTTP calls might be for loading images, css, js and etc so we need to import them as below.
            require_once PUBLIC_PATH . $_REQUEST['url'];
            // require_once $_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'];  This is also correct

        }
    }

}
