<?php

require_once("assets/actorDBConn.php");
require_once("assets/actors.php");
require_once("assets/actorHeader.php");

$db = dbconn();
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? "";
$firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING) ?? "";
$lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING) ?? "";
$dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING) ?? "";
$height = filter_input(INPUT_POST, 'height', FILTER_SANITIZE_STRING) ?? "";
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) ?? null;

switch ($action){
    case "Add":
        addActor($db, $firstName, $lastName, $dob, $height);
        $button = "Add";
        break;
}

echo getActorsAsTable($db);

include_once("assets/actorForm.php");
?>