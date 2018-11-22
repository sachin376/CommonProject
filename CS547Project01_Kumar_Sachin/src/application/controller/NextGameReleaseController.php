<?php
namespace AztecGameStudios\application\controller;

use AztecGameStudios\application\controller\BaseController;
use DateTime;
// require_once __DIR__ . "/../../application/controller/BaseController.php";

class NextGameReleaseController extends BaseController
{
    public function __construct()
    {
    }

    public function load()
    {
        date_default_timezone_set('America/Los_Angeles');
        $start_date = new DateTime("now");
        $end_date = new DateTime('2018-10-31 18:00:00');
        $viewData = $start_date->diff($end_date);
        parent::createView("nextGameRelease", $viewData);
    }
}
