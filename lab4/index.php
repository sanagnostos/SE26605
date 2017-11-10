<?php
/**
 * Created by PhpStorm.
 * User: 001432637
 * Date: 11/1/2017
 * Time: 10:07 AM
 */

require_once("assets/dbconn.php");
require_once("assets/functions.php");
include_once("assets/header.php");


$db = dbconn();
?><a href="assets/addForm.php">Create</a><?php
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?? filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? NULL;
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING) ?? "";
$col = filter_input(INPUT_GET, 'col', FILTER_SANITIZE_STRING) ?? "";
$term = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING) ?? "";
$ASC = filter_input(INPUT_GET, 'ASC', FILTER_VALIDATE_BOOLEAN) ?? "";
$DESC = filter_input(INPUT_GET, 'DESC', FILTER_VALIDATE_BOOLEAN) ?? "";
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
        $button = "Update";
        break;
    case "sort":
        sortRecords($db, $col, $ASC, $DESC);
        break;
    case "search":
        echo searchRecord($db, $col, $term);
        echo "<a href='/lab4/Index.php'>" . 'View All' . "</a>";
        break;
    default:
        echo getCorpsAsTable($db);

}
