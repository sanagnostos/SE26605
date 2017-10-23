<?php
/**
 * Created by PhpStorm.
 * User: 001432637
 * Date: 10/23/2017
 * Time: 7:44 AM
 */

function dbConn()
{

    $dsn = "mysql:host=localhost;dbname=phpclassfall2017";
    $username = "root";
    $password = "";
    $db = new PDO($dsn, $username, $password);

    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;

    } catch (PDOException $e) {
        die("You could not connect to the database.");
    }
}