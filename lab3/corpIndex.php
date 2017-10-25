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
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?? "";
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING) ?? "";
$corp = filter_input(INPUT_POST, 'corp', FILTER_SANITIZE_STRING ?? "");
// $incorp_dt = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING ?? "");
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING ?? "");
$zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING ?? "");
$owner = filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING ?? "");
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING ?? "");

switch($action){
    case "Add":
        header("Location: http://localhost/lab3/assets/create.php");
        $button = "Add";
        break;
    case "Read":

        echo readCorp($db, $id);
        break;

    default:
        echo getCorpsAsTable($db);

}
include_once("assets/corpFooter.php");


