<?php
/**
 * Created by PhpStorm.
 * User: 001432637
 * Date: 11/1/2017
 * Time: 10:07 AM
 */

require_once("assets/dbconn.php");
include("assets/functions.php");
include("assets/header.php");


$db = dbconn();

//sanitize strings follow
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?? "";
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING) ?? "";
$corp = filter_input(INPUT_POST, 'corp', FILTER_SANITIZE_STRING) ?? "";
$incorp_dt = filter_input(INPUT_POST, 'incorp_dt', FILTER_SANITIZE_STRING ?? "");
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
$zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";
$owner = filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) ?? "";

switch($action){

    case "Read":
        echo readRecord($db, $id);
        echo "<a href='/lab4/Index.php'>" . 'View All' . "</a>";
        break;
    case "Delete":
        echo delRecord($db, $id);
        echo "<a href='/lab4/Index.php'>" . 'View All' . "</a>";
        break;
    case "Update":
        upForm($db, $id);
        //echo upRecord($db, $corp, $email, $zipcode, $owner, $phone);
        break;
    default:
        echo getCorpsAsTable($db);

}
