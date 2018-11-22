<?php
namespace AztecGameStudios\framework\core;

use AztecGameStudios\framework\core\Dispatcher;
use AztecGameStudios\framework\core\Initialization;
use AztecGameStudios\framework\core\Request;
use AztecGameStudios\framework\core\Router;
use AztecGameStudios\application\controller\HomeController;

// Using composer's autoload. So, no need to declare all the require statements
// require_once __DIR__ . "/../../framework/core/Dispatcher.php";
// require_once __DIR__ . "/../../framework/core/Router.php";
// require_once __DIR__ . "/../../framework/core/Initialization.php";
// require_once __DIR__ . "/../../framework/core/Request.php";
// require_once __DIR__ . "/../../application/exception/MyCustomExcetion.php";
// require_once __DIR__ . "/../../application/controller/HomeController.php";

// This FrontController class (implementing Facade design pattern) is the core of the framework intercepting every request.

// This class functinalities : Intiliaze suff, Parse/Process URL, Decide which Controller, Invoke controller, Return restponse
// We can also put any security or session related stuff here.

class FrontController
{

    public static function run()
    {
        // echo "yeppeee inside FrontController run()";
        // todo : move index.php request processing code to Request.php file

        $request = new Request();
        $request->processRequest();

        // Initialization::init();         // This was simply calling a static code without using singleton class. Which I think is not better way to do.
        Initialization::getInstance(); // This is to loadConstants. Used Singleton class stragey to load only onces during startup only.
        // var_dump ($obj);
        // $obj.init();

        session_start(); // Start session

        Router::autoload(); // like router.php, which controller to load or which controller to route to.

        // if controller or action are not defined, then land the page to Home page by default.
        // if (!defined('CONTROLLER') || !defined('ACTION') || CONTROLLER == "" || ACTION == "") {
        //     $homeController = new HomeController;
        //     $homeController->load();
        // }
        // elseif(CONTROLLER == "about" || CONTROLLER == "forgotPassword" || CONTROLLER == "game" || CONTROLLER == "home" || CONTROLLER == "login" ||CONTROLLER == "register"){
            Dispatcher::dispatch(); // Dispatch or calling the appropriate controller -> action method
        // }else{
        //     // let the server handle this request
        // }

        // if (defined('CONTROLLER')) {

        // } else {
        //     print(" </br> No Controller defined for this URL. Please correct the URL</br>");
        //     // controller default to home and action default to load.... and load the home page
        // }
    }

}
