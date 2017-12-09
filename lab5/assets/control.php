<?php
/**
 * Created by PhpStorm.
 * User: 001432637
 * Date: 12/8/2017
 * Time: 6:39 PM
 */
require_once ('assets/dbconn.php');
include_once ('assets/sites.php');

$db = dbconn();
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING) ?? filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING) ?? NULL;
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?? NULL;
$site = filter_input(INPUT_POST, 'site', FILTER_VALIDATE_URL) ?? filter_input(INPUT_POST, 'site', FILTER_VALIDATE_URL) ?? NULL;
$siteId = filter_input(INPUT_GET, 'site_id') ?? NULL;
$isValid = false;

switch ($action){
    case "Add":
        $isValid = checkWebsite($db, $site);
        if($site != NULL && $isValid == true){
            addWebsite($db, $site);
        }
        else{
            echo"Not valid or already exists";
        }
    break;
    case "Reset":
        break;
    case "search":
        if($siteId != NULL){
            echo viewLinks($db, $siteId);
        }
        break;
}