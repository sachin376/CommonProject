<?php
namespace AztecGameStudios\application\model;

use AztecGameStudios\application\domain\Game;
use AztecGameStudios\application\exception\MyCustomExcetion;
use AztecGameStudios\application\model\GameModel;

// require_once "GameModel.php";
// require_once __DIR__ . "/../exception/MyCustomExcetion.php";


try {

    $game = getById(12353);
    insert($game);
    getAll();
    // update($game);
    // deleteById(12350);
    // deleteWithORCondtions();
    // deleteWithANDCondtions();

} catch (MyCustomExcetion $ex) {
    print("MY CUSTOM EXCEPTOIN MESSAGE : " . $ex->getMyMessage());
} catch (Excetion $ex) {
    print($ex->getMessage());
}

function getById($id)
{
    $gameModel = new GameModel();
    $game = $gameModel->getById($id);
    print_r($game);
    return $game;

}

function getAll()
{
    $gameModel = new GameModel();
    $result = $gameModel->getAll();
    print_r($result);
}

function insert($game)
{
    $gameModel = new GameModel();
    $game->setId('');
//     $game->setId(12345);
    $game->setTitle("newTitle376");
    $isInstered = $gameModel->insert($game);
    print($isInstered);
}

function update($game)
{
    $gameModel = new GameModel();
    $game->setTitle("updatedTitle");
    $game->setDescription("updatedDesc");
    $result = $gameModel->update($game);
    print_r($result);
}

function deleteById($gameId)
{
    $gameModel = new GameModel();
    $deletedCount = $gameModel->deleteById($gameId);
    print($deletedCount);
}

function deleteWithORCondtions()
{
    $gameModel = new GameModel();
//     $game = $gameModel->getById(1234);
    $game = new Game();
    $game->setId(12347);
    $game->setTitle("newTitle376");
    $deletedCount = $gameModel->deleteWithORCondtions($game);
    print($deletedCount);
}

function deleteWithANDCondtions()
{
    $gameModel = new GameModel();
    $game = $gameModel->getById(12347);
    $game->setTitle("newTitle376");
    $deletedCount = $gameModel->deleteWithANDCondtions($game);
    print($deletedCount);
}
