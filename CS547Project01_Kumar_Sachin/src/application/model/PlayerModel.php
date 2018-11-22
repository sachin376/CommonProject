<?php
namespace AztecGameStudios\application\model;

use AztecGameStudios\application\exception\MyCustomExcetion;
use AztecGameStudios\application\domain\Player;
use AztecGameStudios\application\model\InterfacePlayerModel;

// Works in run but giving error in debug
// require_once("src/application/domain/Player.php");

// Works in debug but giving error in run
// require_once("../domain/Player.php");


// Works in run and debug both
// require_once __DIR__ . '/../domain/Player.php';

// require_once __DIR__ . "/../exception/MyCustomExcetion.php";
// require_once "AbstractModel.php";
// require_once "InterfacePlayerModel.php";

class PlayerModel extends AbstractModel implements InterfacePlayerModel{

    private static $tableName = "players";

    /**
     * Return the player with the given auto-generated ID.
     */
    public function getById($id){

        $columnName = "id";

        $sql = 'SELECT * FROM '. self::$tableName.
        ' WHERE '.$columnName.' = :playerId';

        $stmt = parent::$db->prepare($sql);
        $stmt->execute(array(':playerId' => $id));
        $row = $stmt->fetch();

        // todo : if(enpty($row)){
        if(!$row){
            throw new MyCustomExcetion("No record found with this id ".$id);
        }
        // print_r($row);
        return $this->populateDomain($row);
    }


    public function getByEmailId($email){

        $columnName = "email";

        $sql = 'SELECT * FROM '. self::$tableName.
        ' WHERE '.$columnName.' = :email';

        $stmt = parent::$db->prepare($sql);
        $stmt->execute(array(':email' => $email));
        $row = $stmt->fetch();

        // todo : if(enpty($row)){
        if(!$row){
            throw new MyCustomExcetion("No record found with this email id : ".$email);
        }
        // print_r($row);
        return $this->populateDomain($row);
    }

    public function getAll(){

        $sql = 'SELECT * FROM '. self::$tableName;
        $stmt = parent::$db->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        
        // todo : if(enpty($rows)){
        if(!$rows){
            throw new MyCustomExcetion("No record found");
        }
        
        $result = array();
        foreach ($rows as $row)
        {
            // echo $row['id'] . "\n";
            array_push($result, $this->populateDomain($row));
        }

        return $result;
    }

    public function insert($player){

        $sql = 'INSERT INTO '.self::$tableName.
        '(id, screen_name, first_name, last_name, password, email, favorite_game, phone, phone_type, dob, date_joined, last_login, role, created_date, updated_date ) 
        VALUES
        (:id, :screen_name, :first_name, :last_name, :password, :email, :favorite_game, :phone, :phone_type, :dob, :date_joined, :last_login, :role, :created_date, :updated_date ) ';

        $stmt = parent::$db->prepare($sql);
        $stmt -> bindValue(':id', $player->getId());
        $stmt = $this->bindValueFromObjectToStmt($player, $stmt);
        $success = $stmt -> execute();
        
        if(!$success){
            throw new MyCustomExcetion("Error : Couldn't insert player record in DB for playerId".$player->getId());
        }
        return true;
    }

    public function update($player){

        $sql = 'UPDATE '.self::$tableName. 
        ' SET 
        screen_name = :screen_name, 
        first_name = :first_name, 
        last_name = :last_name, 
        password = :password, 
        favorite_game = :favorite_game, 
        phone = :phone, 
        phone_type = :phone_type, 
        dob = :dob, 
        date_joined = :date_joined, 
        last_login = :last_login, 
        role = :role, 
        created_date = :created_date, 
        updated_date = :updated_date 
        WHERE email = :email ';
        
        $stmt = parent::$db->prepare($sql);
        $stmt = $this->bindValueFromObjectToStmt($player, $stmt);
        $success = $stmt -> execute();

        $updated = $stmt->rowCount();
        if(!$updated){
            throw new MyCustomExcetion("Error : No record has been updated for playerId".$player->getId());
        }
        return $updated;
    }

    public function deleteById($playerId){

        $sql = 'DELETE FROM '.self::$tableName.' WHERE id = ?';
        $stmt = parent::$db->prepare($sql);
        $stmt->execute([$playerId]);
        // $stmt -> bindValue(':id', $playerId);
        // $stmt -> execute();
        
        $deleted = $stmt->rowCount();
        if(!$deleted){
            throw new MyCustomExcetion("Error : No record has been deleted for playerId".$player->getId());
        }

        return $deleted;
    }

    public function deleteWithORCondtions($player){

        $sql = 'DELETE FROM '.self::$tableName.
        ' WHERE 
        email = :email 
        or screen_name = :screen_name 
        or password = :password 
        or dob = :dob 
        or favorite_game = :favorite_game 
        or phone = :phone 
        or last_login = :last_login 
        or role = :role 
        or created_date = :created_date 
        or updated_date = :updated_date';

        $stmt = parent::$db->prepare($sql);
        $stmt = $this->bindValueFromObjectToStmt($player, $stmt);
        $success = $stmt -> execute();

        $deleted = $stmt->rowCount();
        if(!$deleted){
            throw new MyCustomExcetion("Error : No record has been deleted for players");
        }
        return $deleted;
    }

    public function deleteWithANDCondtions($player){

        $sql = 'DELETE FROM '.self::$tableName.
        ' WHERE 
        email = :email 
        and screen_name = :screen_name 
        and password = :password 
        and dob = :dob 
        and favorite_game = :favorite_game 
        and phone = :phone 
        and last_login = :last_login 
        and role = :role 
        and created_date = :created_date 
        and updated_date = :updated_date';

        $stmt = parent::$db->prepare($sql);
        $stmt = $this->bindValueFromObjectToStmt($player, $stmt);
        $success = $stmt -> execute();

        $deleted = $stmt->rowCount();
        if(!$deleted){
            throw new MyCustomExcetion("Error : No record has been deleted for players");
        }
        return $deleted;
    }


    private function populateDomain($row){
        $player = Player::getInstance() 
            -> setId($row["id"])
            -> setScreenName($row["screen_name"])
            -> setPassword($row["password"])
            -> setDob($row["dob"])
            -> setFavoriteGame($row["favorite_game"])
            -> setPhone($row["phone"])
            -> setLastLogin($row["last_login"])
            -> setRole($row["role"])
            -> setCreatedDate($row["created_date"])
            -> setUpdatedDate($row["updated_date"]);
        // print_r($player);
        return $player;
    }

    private function bindValueFromObjectToStmt($player, $stmt){

        // $stmt -> bindValue(':id', $player->getId());
        $stmt -> bindValue(':screen_name', $player->getScreenName());
        $stmt -> bindValue(':first_name', $player->getFirstName());
        $stmt -> bindValue(':last_name', $player->getLastName());
        $stmt -> bindValue(':password', $player->getPassword());
        $stmt -> bindValue(':email', $player->getEmail());
        $stmt -> bindValue(':favorite_game', $player->getFavoriteGame());
        $stmt -> bindValue(':phone', $player->getPhone());
        $stmt -> bindValue(':phone_type', $player->getPhoneType());
        $stmt -> bindValue(':dob', $player->getDob());
        $stmt -> bindValue(':date_joined', $player->getDateJoined());
        $stmt -> bindValue(':last_login', $player->getLastLogin());
        $stmt -> bindValue(':role', $player->getRole());
        $stmt -> bindValue(':created_date', $player->getCreatedDate());
        $stmt -> bindValue(':updated_date', $player->getUpdatedDate());
        return $stmt;
    }
}
?>