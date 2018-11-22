<?php
namespace AztecGameStudios\application\controller;

use AztecGameStudios\application\controller\BaseController;
use AztecGameStudios\application\domain\Player;
use AztecGameStudios\application\model\PlayerModel;
use AztecGameStudios\application\exception\MyCustomExcetion;

// Using composer's autoload. So, no need to declare all the require statements
// require_once __DIR__ . "/../model/PlayerModel.php";
// require_once __DIR__ . "/../domain/Player.php";
// require_once __DIR__ . "/../exception/MyCustomExcetion.php";
// require_once __DIR__ . "/../../application/controller/BaseController.php";

class LoginController extends BaseController
{
    public function __construct()
    {
    }

    public function load()
    {
        $viewData = "";
        parent::createView("login", $viewData);
    }

    public function logout()
    {
        $viewData = "You are successfully Logout !!";
        $_SESSION['isAuthenticated'] = 'false';
        parent::createView("login", $viewData);
    }

    public function authenticateUser()
    {
        $viewData = "";
        $_SESSION['isAuthenticated'] = 'false';

        $email = $_POST["email"];
        $typedPassword = $_POST["password"];

        $playerModel = new PlayerModel();
        try{
            $playerDomain = $playerModel->getByEmailId($email);
            $storedPassword  = $playerDomain->getPassword();
        }
        catch(MyCustomExcetion $ex){
            $viewData = "Wrong Email Id !! No records found for this Email. Either Register or enter correct email.";
            parent::createView("login", $viewData);
            return;
        }
        
        if($typedPassword !="" && $storedPassword == $typedPassword){
            // Turn on the flag for authenticated user in seesion scope
            $_SESSION['isAuthenticated'] = 'true';
            $viewData = "Suceesful login! You are authenticated user";
            parent::createView("home", $viewData);
        }else{
            $viewData = "Wrong Password !! Please enter correct password.";
            parent::createView("login", $viewData);
        }
    }


    public function insert()
    {
        $player = $this->populateDomain();
        
        try{
            $playerModel = new PlayerModel();
            $viewData = $playerModel->insert($player);
            if (!$viewData) {
                $viewData = "Couldn't save player in the DB";
            }
        }
        catch(MyCustomExcetion $ex){
            $viewData = "Couldn't save player in the DB";
        }
        parent::createView("login", $viewData);

    }

    public function forgotPassword()
    {
        $viewData = "";
        parent::createView("register", $viewData);
    }
}
