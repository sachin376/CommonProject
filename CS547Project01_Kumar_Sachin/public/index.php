<?php
// require_once __DIR__ . '\..\vendor\autoload.php';
require_once __DIR__ . '/../vendor/autoload.php';
// echo "<h1>My First PHP project</h1>";

function __autoload($class_name)
{
    if (file_exists('../src/application/controller' . $class_name . '.php')) {
        require_once '../src/application/controller' . $class_name . '.php';
    }
    else if (file_exists('../src/application/model' . $class_name . '.php')) {
        require_once '../src/application/model' . $class_name . '.php';
    }
    else if (file_exists('../src/application/view' . $class_name . '.php')) {
        require_once '../src/application/view' . $class_name . '.php';
    }
    
}


// require_once __DIR__ . "/../src/framework/core/FrontController.php";
use AztecGameStudios\framework\core\FrontController;
FrontController::run();

// If below rule is there in .htaccess file then the parameter 'url' gets created in _GET
// # RewriteRule ^(.+)$ index.php?url=$1 [L]
// var_dump($_GET);
// echo $_GET['url'];
