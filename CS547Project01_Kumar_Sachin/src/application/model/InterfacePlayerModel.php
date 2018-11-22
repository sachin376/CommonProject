<?php
namespace AztecGameStudios\application\model;

interface InterfacePlayerModel
{
    /**
     * Return the player with the given auto-generated ID.
     */
    function getById($id);

    /**
     * Return all of the Players.
     */
    function getAll();

    /**
     * Store the new Player and assign a unique auto-generated ID.
     */
    function insert($player);

    /**
     * Update the player's fields.
     */
    function update($player);

    /**
     * Delete the player from the databas providing playerId
     */
    function deleteById($playerId);

    /**
     * Delete all of the players fulfilling any of the condition provided.
     */
    function deleteWithORCondtions($player);

    /**
     * Delete all of the players fulfilling all of the condition provided.
     */
    function deleteWithANDCondtions($player);

}
