<?php
namespace AztecGameStudios\application\domain;

// require_once("BaseDomain.php");

class Player extends BaseDomain{

    private $id;
    private $screenName;
    private $firstName;
    private $lastName;
    private $password;
    private $encryptedPassword;
    private $plaintextPassword;
    private $email;
    private $favoriteGame;
    private $phone;
    private $phoneType;
    private $dob;
    private $dateJoined;
    private $lastLogin;
    private $role;
    private $createdDate;
    private $updatedDate;


    public function __construct(){
    }

    /**
     * factory method to instantiate an object
     */
    public static function getInstance(){
        return new self();
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    

    public function getScreenName(){
        return $this->screenName;
    }
    public function setScreenName($screenName){
        $this->screenName = $screenName;
        return $this;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }
    public function setFirstName($firstName){
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(){
        return $this->lastName;
    }
    public function setLastName($lastName){
        $this->lastName = $lastName;
        return $this;
    }

    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
        return $this;
    }

    public function getEncryptedPassword(){
        return $this->encryptedPassword;
    }
    public function setEncryptedPassword($encryptedPassword){
        $this->encryptedPassword = $encryptedPassword;
        return $this;
    }

    public function getPlaintextPassword(){
        return $this->plaintextPassword;
    }
    public function setPlaintextPassword($plaintextPassword){
        $this->plaintextPassword = $plaintextPassword;
        return $this;
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
        return $this;
    }

    public function getFavoriteGame(){
        return $this->favoriteGame;
    }
    public function setFavoriteGame($favoriteGame){
        $this->favoriteGame = $favoriteGame;
        return $this;
    }

    public function getPhone(){
        return $this->phone;
    }
    public function setPhone($phone){
        $this->phone = $phone;
        return $this;
    }

    public function getPhoneType(){
        return $this->phoneType;
    }
    public function setPhoneType($phoneType){
        $this->phoneType = $phoneType;
        return $this;
    }

    public function getDob(){
        return $this->dob;
    }
    public function setDob($dob){
        $this->dob = $dob;
        return $this;
    }

    public function getDateJoined(){
        return $this->dateJoined;
    }
    public function setDateJoined($dateJoined){
        $this->dateJoined = $dateJoined;
        return $this;
    }

    public function getLastLogin(){
        return $this->lastLogin;
    }
    public function setLastLogin($lastLogin){
        $this->lastLogin = $lastLogin;
        return $this;
    }

    public function getRole(){
        return $this->role;
    }
    public function setRole($role){
        $this->role = $role;
        return $this;
    }

    public function getCreatedDate(){
        return $this->createdDate;
    }
    public function setCreatedDate($createdDate){
        $this->createdDate = $createdDate;
        return $this;
    }

    public function getUpdatedDate(){
        return $this->updatedDate;
    }
    public function setUpdatedDate($updatedDate){
        $this->updatedDate = $updatedDate;
        return $this;
    }
}