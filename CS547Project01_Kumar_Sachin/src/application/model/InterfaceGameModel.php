<?php
namespace AztecGameStudios\application\model;

interface InterfaceGameModel
{
    /**
     * Return the game with the given auto-generated ID.
     */
    function getById($id);

    /**
     * Return all of the games.
     */
    function getAll();

    /**
     * Store the new game and assign a unique auto-generated ID.
     */
    function insert($game);

    /**
     * Update the game's fields.
     */
    function update($game);

    /**
     * Delete the game from the databas providing gameId
     */
    function deleteById($gameId);

    /**
     * Delete all of the games fulfilling any of the condition provided.
     */
    function deleteWithORCondtions($game);

    /**
     * Delete all of the games fulfilling all of the condition provided.
     */
    function deleteWithANDCondtions($game);

}
