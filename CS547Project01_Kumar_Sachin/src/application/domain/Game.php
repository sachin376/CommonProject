<?php
namespace AztecGameStudios\application\domain;

// require_once("BaseDomain.php");

class Game extends BaseDomain{

    private $id;
    private $title;
    private $description;
    private $genre;
    private $artist;
    private $cost;
    private $releaseDate;
    private $rating;
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

    public function getTitle(){
        return $this->title;
    }
    public function setTitle($title){
        $this->title = $title;
        return $this;
    }

    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this->description = $description;
        return $this;
    }

    public function getGenre(){
        return $this->genre;
    }
    public function setGenre($genre){
        $this->genre = $genre;
        return $this;
    }

    public function getArtist(){
        return $this->artist;
    }
    public function setArtist($artist){
        $this->artist = $artist;
        return $this;
    }

    public function getCost(){
        return $this->cost;
    }
    public function setCost($cost){
        $this->cost = $cost;
        return $this;
    }

    public function getReleaseDate(){
        return $this->releaseDate;
    }
    public function setReleaseDate($releaseDate){
        $this->releaseDate = $releaseDate;
        return $this;
    }

    public function getRating(){
        return $this->rating;
    }
    public function setRating($rating){
        $this->rating = $rating;
        return $this;
    }

    public function getCreatedDate()
    {
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