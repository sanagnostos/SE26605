<?php
/**
 * Created by PhpStorm.
 * User: 001432637
 * Date: 10/23/2017
 * Time: 8:03 AM
 */

require_once("assets/dbconn.php");
require_once("assets/corps.php");
require_once ("assets/corpsHead.php");

$db = dbconn();
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? "";
$id = filter_input(INPUT_POST, 'action', FILTER_VALIDATE_INT) ?? "";

echo "hey";