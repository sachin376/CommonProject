<?php
namespace AztecGameStudios\application\controller;

use AztecGameStudios\application\controller\BaseController;
use AztecGameStudios\application\domain\Game;
use AztecGameStudios\application\exception\MyCustomExcetion;
use AztecGameStudios\application\model\GameModel;
use AztecGameStudios\framework\helpers\DateUtil;

// Using composer's autoload. So, no need to declare all the require statements
// require_once __DIR__ . "/../model/GameModel.php";
// require_once __DIR__ . "/../domain/Game.php";
// require_once __DIR__ . "/../exception/MyCustomExcetion.php";
// require_once __DIR__ . "/../../application/controller/BaseController.php";
// require_once __DIR__ . "/../../framework/helpers/DateUtil.php";

class GameController extends BaseController
{
    public function __construct()
    {
    }

    public function load()
    {
        if (defined('PARAM')) {
            echo "</br> yes PARAM is defined </br>";
        }
        $gameModel = new GameModel();
        $viewData = $gameModel->getAll();
        parent::createView("game", $viewData);
    }

    public function insert()
    {

        try {
            $game = $this->populateDomain();
            $gameModel = new GameModel();
            $isInstered = $gameModel->insert($game);
            if (!$isInstered) {
                $viewData = "Couldn't save game in the DB";
            }
        } catch (MyCustomExcetion $ex) {
            $viewData = "Couldn't save game in the DB";
            // parent::createView("game", $viewData);
            // return;
        }

        $viewData = $gameModel->getAll();
        parent::createView("game", $viewData);

    }

    public function update()
    {
        try {
            $game = $this->populateDomain();

            $dateFormated = DateUtil::stringToDate($_POST["created_date"], 'Y/m/d');
            $game->setCreatedDate($dateFormated);
            $game->setId($_POST["gameid"]);

            $gameModel = new GameModel();
            $isInstered = $gameModel->update($game);
            if (!$isInstered) {
                $viewData = "Couldn't update game in the DB";
            }

        } catch (MyCustomExcetion $ex) {
            $viewData = "Couldn't update game in the DB";
            // parent::createView("login", $viewData);
            // return;
        }

        $viewData = $gameModel->getAll();
        parent::createView("game", $viewData);
    }

    public function delete()
    {

        try {
            $gameModel = new GameModel();
            $deleted = $gameModel->deleteById($_POST["gameid"]);
            if (!$deleted) {
                $viewData = "Couldn't delete the game from the DB";
            }
        } catch (MyCustomExcetion $ex) {
            $viewData = "Couldn't delete the game from the DB";
            // parent::createView("login", $viewData);
            // return;
        }

        $viewData = $gameModel->getAll();
        parent::createView("game", $viewData);
    }

    private function populateDomain()
    {

        $dateFormated = DateUtil::stringToDate($_POST["release_date"], 'Y/m/d');
        $game = Game::getInstance()
            ->setTitle($_POST["title"])
            ->setDescription($_POST["description"])
            ->setGenre($_POST["genre"])
            ->setArtist($_POST["artist"])
            ->setCost($_POST["cost"])
            ->setReleaseDate($dateFormated)
            ->setRating($_POST["rating"])
            ->setCreatedDate(date("Y/m/d"))
            ->setUpdatedDate(date("Y/m/d"));
        return $game;
    }

}
