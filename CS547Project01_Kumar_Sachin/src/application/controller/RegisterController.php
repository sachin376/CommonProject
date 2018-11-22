<?php
namespace AztecGameStudios\application\controller;

use AztecGameStudios\application\controller\BaseController;
use AztecGameStudios\application\domain\Player;
use AztecGameStudios\application\model\PlayerModel;
use AztecGameStudios\framework\helpers\DateUtil;

// Using composer's autoload. So, no need to declare all the require statements
// require_once __DIR__ . "/../model/PlayerModel.php";
// require_once __DIR__ . "/../domain/Player.php";
// require_once __DIR__ . "/../exception/MyCustomExcetion.php";
// require_once __DIR__ . "/../../application/controller/BaseController.php";
// require_once __DIR__ . "/../../framework/helpers/DateUtil.php";

class RegisterController extends BaseController
{
    public function __construct()
    {
    }

    public function load()
    {
        $viewData = "";
        parent::createView("register", $viewData);
    }

    public function insert()
    {

        try {
            $player = $this->populateDomain();
            $playerModel = new PlayerModel();
            $isInstered = $playerModel->insert($player);
            if (!$isInstered) {
                $viewData = "Couldn't save player in the DB";
            }
        } catch (MyCustomExcetion $ex) {
            $viewData = "Couldn't save player in the DB";
            parent::createView("login", $viewData);
            return;
        }
        $viewData = "Registration successful !! Please login with your credentials now.";
        parent::createView("login", $viewData);

    }

    public function update()
    {

        try {
            $player = $this->populateDomain();
            $playerModel = new PlayerModel();
            $isInstered = $playerModel->update($player);
            if (!$isInstered) {
                $viewData = "Couldn't update player in the DB having email id " . $player->getEmail();
            }
        } catch (MyCustomExcetion $ex) {
            $viewData = "Couldn't update player in the DB having email id " . $player->getEmail();
            parent::createView("login", $viewData);
            return;
        }
        $viewData = "Record updated for player whose email id is " . $player->getEmail();
        parent::createView("login", $viewData);
    }

    private function populateDomain()
    {

        $dateFormated = DateUtil::stringToDate($_POST["dob"], 'Y/m/d');

        $player = Player::getInstance()
            ->setScreenName($_POST["screen_name"])
            ->setFirstName($_POST["first_name"])
            ->setLastName($_POST["last_name"])
            ->setEmail($_POST["email"])
            ->setPassword($_POST["password"])
            ->setDob($dateFormated)
            ->setFavoriteGame($_POST["favorite_game"])
            ->setPhone($_POST["phone"])
            ->setPhoneType($_POST["phonetype"])
            ->setLastLogin(date("Y/m/d"))
            ->setDateJoined(date("Y/m/d"))
            ->setRole("member")
            ->setCreatedDate(date("Y/m/d"))
            ->setUpdatedDate(date("Y/m/d"));
        // print_r($player);
        return $player;
    }

}
