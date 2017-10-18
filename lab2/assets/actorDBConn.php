<?php
/**
 * Created by PhpStorm.
 * User: 001432637
 * Date: 10/18/2017
 * Time: 10:05 AM
 */
function dbConn()
{

    $dsn = "mysql:host=localhost;dbname=actors";
    $username = "actors";
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