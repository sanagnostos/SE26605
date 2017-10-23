<?php
/**
 * Created by PhpStorm.
 * User: 001432637
 * Date: 10/23/2017
 * Time: 7:45 AM
 */

require_once("assets/dbconn.php");
require_once("assets/corps.php");
require_once ("assets/corpsHead.php");

$db = dbconn();
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? "";
$id = filter_input(INPUT_POST, 'action', FILTER_VALIDATE_INT) ?? "";


switch($action){
    case "Add":
        header("location:http://localhost:63342/htdocs/lab3/assets/create.php");
        break;
    case "Read";

        echo readCorp($db, $id);
        break;


}
echo getCorpsAsTable($db);


