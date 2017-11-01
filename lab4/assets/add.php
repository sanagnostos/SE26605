<?php
/**
 * Created by PhpStorm.
 * User: 001432637
 * Date: 11/1/2017
 * Time: 10:52 AM
 */
include("header.php");?>
<form method="post" action="#">
    Corporation: <input type="text" name="corp" value=""><br />
    Email: <input type="text" name="email" value=""><br />
    Zip Code: <input type="text" name="zipcode" value=""><br />
    Owner: <input type="text" name="owner" value=""><br />
    Phone Number: <input type="text" name="phone" value=""><br />
    <input type="submit" name="action" value="Add" />

</form>
<?php
require_once("dbconn.php");
include("functions.php");


$db = dbconn();
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? "";
$corp = filter_input(INPUT_POST, 'corp', FILTER_SANITIZE_STRING) ?? "";
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
$zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";
$owner = filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) ?? "";

switch($action) {
    case"Add":
        echo addCorp($db, $corp, $email, $zipcode, $owner, $phone);
        break;
}
?>