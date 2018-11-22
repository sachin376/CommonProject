<?php
namespace AztecGameStudios\application\exception;
use Exception;

class MyCustomExcetion extends Exception
{
    private $myMessage;

    public function __construct($myMessage){
        $this->myMessage = $myMessage;
    }

    public function getMyMessage()
    {
        return $this->myMessage;
    }
    public function setMyMessage($myMessage)
    {
        $this->myMessage = $myMessage;
        return $this;
    }
}