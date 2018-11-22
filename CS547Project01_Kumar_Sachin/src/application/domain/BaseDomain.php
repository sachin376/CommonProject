<?php
namespace AztecGameStudios\application\domain;

class BaseDomain{
    private $propertiesMap;
    
    /**
     * BaseDoamin defualt construct
     */ 
    public function __construct(){
    }

    /**
     * Get the value of propertiesMap
     */ 
    public function getPropertiesMap(){
        return $this->propertiesMap;
    }

    /**
     * Set the value of propertiesMap
     *
     * @return  self
     */ 
    public function setPropertiesMap($propertiesMap){
        $this->propertiesMap = $propertiesMap;
        return $this;
    }
}