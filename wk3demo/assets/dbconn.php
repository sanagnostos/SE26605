<?php
/**
 * Created by PhpStorm.
 * User: 001432637
 * Date: 10/16/2017
 * Time: 8:44 AM
 */
function dbConn()
{

    $dsn = "mysql:host=localhost;dbname=dogs";
    $username = "dogs";
    $password = "se266";
    $db = new PDO($dsn, $username, $password);

    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;

    } catch (PDOException $e) {
        die("You could not connect to the database.");
    }
}
?>