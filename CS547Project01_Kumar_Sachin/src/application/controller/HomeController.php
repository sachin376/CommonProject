<?php
namespace AztecGameStudios\application\controller;

use AztecGameStudios\application\controller\BaseController;

// require_once __DIR__ . "/../../application/controller/BaseController.php";

class HomeController extends BaseController
{
    public function __construct()
    {
    }

    public function load()
    {
        // echo "testing : Insdie homeController, load method";
        $viewData = "";
        parent::createView("home", $viewData);
    }
}
