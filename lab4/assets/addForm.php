<?php
/**
 * Created by PhpStorm.
 * User: Steven
 * Date: 11/9/2017
 * Time: 6:58 PM
 */ ?>
    <form method="post" action="#">
        Corporation: <input type="text" name="corp" value=""><br />
        Email: <input type="text" name="email" value=""><br />
        Zip Code: <input type="text" name="zipcode" value=""><br />
        Owner: <input type="text" name="owner" value=""><br />
        Phone Number: <input type="text" name="phone" value=""><br />
        <a href="/lab4/Index.php">View All</a>
        <input type="submit" name="action" value="Save" />

    </form>
<?php
require_once("dbconn.php");
include("functions.php");

$db = dbConn();
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? "";
$corp = filter_input(INPUT_POST, 'corp', FILTER_SANITIZE_STRING) ?? "";
// $incorp_dt = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? "";
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
$zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";
$owner = filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) ?? "";

switch($action) {
case"Save":
echo addRecord($db, $corp, $email, $zipcode, $owner, $phone);
break;
}
?>