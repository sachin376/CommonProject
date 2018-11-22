<?php
namespace AztecGameStudios\core;

class RouterProfStyle
{

    private $route_table;

    public function __construct()
    {

    }

    public function getUrl(): string
    {
        return $this->domain . $this->path;
    }

    // Other Class methods like
    // route_
    // getRoute
    // executeController for route
    // Misc helpers

}
