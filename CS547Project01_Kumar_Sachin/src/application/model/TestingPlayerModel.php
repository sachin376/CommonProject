<?php
namespace AztecGameStudios\application\model;

use AztecGameStudios\application\domain\Player;
use AztecGameStudios\application\exception\MyCustomExcetion;
use AztecGameStudios\application\model\PlayerModel;

// require_once "PlayerModel.php";
// require_once __DIR__ . "/../exception/MyCustomExcetion.php";


try {

    $player = new Player();
    // $player = getById(2);
    insert($player);
    // getAll();
    // update($player);
    // deleteById(2);
    // deleteWithORCondtions();
    // deleteWithANDCondtions();

} catch (MyCustomExcetion $ex) {
    print("MY CUSTOM EXCEPTOIN MESSAGE : " . $ex->getMyMessage());
} catch (Excetion $ex) {
    print($ex->getMessage());
}

function getById($id)
{
    $playerModel = new PlayerModel();
    $player = $playerModel->getById($id);
    print_r($player);
    return $player;

}

function getAll()
{
    $playerModel = new PlayerModel();
    $result = $playerModel->getAll();
    print_r($result);
}

function insert($player)
{
    $playerModel = new PlayerModel();
    // $player->setId('');
//     $player->setId(12345);
    $player->setScreenName("newscreenName376");
    $isInstered = $playerModel->insert($player);
    print($isInstered);
}

function update($player)
{
    $playerModel = new PlayerModel();
    $player->setScreenName("updatedscreenName");
    $player->setFavoriteGame("updatedFavoriteGame");
    $result = $playerModel->update($player);
    print_r($result);
}

function deleteById($playerId)
{
    $playerModel = new PlayerModel();
    $deletedCount = $playerModel->deleteById($playerId);
    print($deletedCount);
}

function deleteWithORCondtions()
{
    $playerModel = new PlayerModel();
//     $player = $playerModel->getById(1234);
    $player = new Player();
    $player->setId(12347);
    $player->setScreenName("newscreenName376");
    $deletedCount = $playerModel->deleteWithORCondtions($player);
    print($deletedCount);
}

function deleteWithANDCondtions()
{
    $playerModel = new PlayerModel();
    $player = $playerModel->getById(12347);
    $player->setScreenName("newscreenName376");
    $deletedCount = $playerModel->deleteWithANDCondtions($player);
    print($deletedCount);
}
