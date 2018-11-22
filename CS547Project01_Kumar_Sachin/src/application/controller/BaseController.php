<?php
namespace AztecGameStudios\application\controller;

class BaseController
{
    public function __construct()
    {
    }

    public static function createView($viewName, $viewData){
        
        if (isset( $_SESSION["isAuthenticated"]) && $_SESSION["isAuthenticated"] == 'true'){
            $isAuthenticated = 'true';
        }else{
            $isAuthenticated = 'false';
        }

        // Below code to include php file whithout using twig template engine
        // require_once VIEW_PATH . "phpFilesForBkup/". $viewName.".php";

        // Using twig template engine
        $loader = new \Twig_Loader_Filesystem(VIEW_PATH);
        $twig = new \Twig_Environment($loader);


        echo $twig->render ( $viewName.".twig", array(
            'isAuthenticated' => $isAuthenticated,
            'viewData' => $viewData
        ));
    }

}
