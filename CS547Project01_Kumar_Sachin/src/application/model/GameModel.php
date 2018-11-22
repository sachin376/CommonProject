<?php
namespace AztecGameStudios\application\model;

use AztecGameStudios\application\domain\Game;
use AztecGameStudios\application\exception\MyCustomExcetion;
use AztecGameStudios\application\model\InterfaceGameModel;

// Works in run but giving error in debug
// require_once("src/application/domain/Game.php");

// Works in debug but giving error in run
// require_once("../domain/Game.php");

// Works in run and debug both
require_once __DIR__ . '/../domain/Game.php';

require_once __DIR__ . "/../exception/MyCustomExcetion.php";
require_once "AbstractModel.php";
require_once "InterfaceGameModel.php";

class GameModel extends AbstractModel implements InterfaceGameModel
{

    private static $tableName = "games";

    /**
     * Return the game with the given auto-generated ID.
     */
    public function getById($id)
    {

        $columnName = "id";

        $sql = 'SELECT * FROM ' . self::$tableName . ' WHERE ' . $columnName . ' = :gameId';
        $stmt = parent::$db->prepare($sql);
        $stmt->execute(array(':gameId' => $id));
        $row = $stmt->fetch();

        // todo : if(enpty($row)){
        if (!$row) {
            throw new MyCustomExcetion("No record found with this id " . $id);
        }
        print_r($row);
        return $this->populateDomain($row);
    }

    public function getAll()
    {

        $sql = 'SELECT * FROM ' . self::$tableName;
        $stmt = parent::$db->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();

        // todo : if(enpty($rows)){
        if (!$rows) {
            throw new MyCustomExcetion("No record found");
        }

        $result = array();
        foreach ($rows as $row) {
            // echo $row['id'] . "\n";
            array_push($result, $this->populateDomain($row));
        }

        return $result;
    }

    public function insert($game)
    {

        $sql = 'INSERT INTO ' . self::$tableName .
            '(id, title, description, genre, artist, cost, release_date, rating, created_date, updated_date )
        VALUES
        (:id, :title, :description, :genre, :artist, :cost, :release_date, :rating, :created_date, :updated_date )';

        $stmt = parent::$db->prepare($sql);
        $stmt = $this->bindValueFromObjectToStmt($game, $stmt);
        $success = $stmt->execute();

        if (!$success) {
            throw new MyCustomExcetion("Error : Couldn't insert player record in DB for gameId" . $game->getId());
        }

        return true;
    }

    public function update($game)
    {

        $sql = 'UPDATE ' . self::$tableName . '
        SET
        title = :title,
        description = :description,
        genre = :genre,
        artist = :artist,
        cost = :cost,
        release_date = :release_date,
        rating = :rating,
        created_date = :created_date,
        updated_date = :updated_date
        WHERE id = :id ';

        $stmt = parent::$db->prepare($sql);
        $stmt = $this->bindValueFromObjectToStmt($game, $stmt);
        $success = $stmt->execute();

        if (!$success) {
            throw new MyCustomExcetion("Error : No record has been updated for gameId" . $game->getId());
        }

        $updated = $stmt->rowCount();
        return $updated;
    }

    public function deleteById($gameId)
    {

        $sql = 'DELETE FROM ' . self::$tableName . ' WHERE id = ?';
        $stmt = parent::$db->prepare($sql);
        $stmt->execute([$gameId]);
        // $stmt -> bindValue(':id', $gameId);
        // $stmt -> execute();
        $deleted = $stmt->rowCount();
        
        if(!$deleted){
            throw new MyCustomExcetion("Error : No record has been deleted for gameId".$game->getId());
        }

        return $deleted;
    }

    public function deleteWithORCondtions($game)
    {

        $sql = 'DELETE FROM ' . self::$tableName . ' WHERE id = :id or title = :title or description = :description or genre = :genre or artist = :artist or cost = :cost or release_date = :release_date or rating = :rating or created_date = :created_date or updated_date = :updated_date';

        $stmt = parent::$db->prepare($sql);
        $stmt = $this->bindValueFromObjectToStmt($game, $stmt);
        $stmt->execute();

        $deleted = $stmt->rowCount();
        if(!$deleted){
            throw new MyCustomExcetion("Error : No record has been deleted");
        }

        return $deleted;
    }

    public function deleteWithANDCondtions($game)
    {

        $sql = 'DELETE FROM ' . self::$tableName . ' WHERE id = :id and title = :title and description = :description and genre = :genre and artist = :artist and cost = :cost and release_date = :release_date and rating = :rating and created_date = :created_date and updated_date = :updated_date';

        $stmt = parent::$db->prepare($sql);
        $stmt = $this->bindValueFromObjectToStmt($game, $stmt);
        $stmt->execute();

        $deleted = $stmt->rowCount();
        if(!$deleted){
            throw new MyCustomExcetion("Error : No record has been deleted");
        }
        return $deleted;
    }

    private function populateDomain($row)
    {
        $game = Game::getInstance()
            ->setId($row["id"])
            ->setTitle($row["title"])
            ->setDescription($row["description"])
            ->setGenre($row["genre"])
            ->setArtist($row["artist"])
            ->setCost($row["cost"])
            ->setReleaseDate($row["release_date"])
            ->setRating($row["rating"])
            ->setCreatedDate($row["created_date"])
            ->setUpdatedDate($row["updated_date"]);
        // print_r($game);
        return $game;
    }

    private function bindValueFromObjectToStmt($game, $stmt)
    {

        $stmt->bindValue(':id', $game->getId());
        $stmt->bindValue(':title', $game->getTitle());
        $stmt->bindValue(':description', $game->getDescription());
        $stmt->bindValue(':genre', $game->getGenre());
        $stmt->bindValue(':artist', $game->getArtist());
        $stmt->bindValue(':cost', $game->getCost());
        $stmt->bindValue(':release_date', $game->getReleaseDate());
        $stmt->bindValue(':rating', $game->getRating());
        $stmt->bindValue(':created_date', $game->getCreatedDate());
        $stmt->bindValue(':updated_date', $game->getUpdatedDate());
        return $stmt;
    }
}
