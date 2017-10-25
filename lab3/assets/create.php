<?php
/**
 * Created by PhpStorm.
 * User: 001432637
 * Date: 10/23/2017
 * Time: 7:49 AM
 */?>
<form method="post" action="#">
    Corporation: <input type="text" name="corp" value=""><br />
    Email: <input type="text" name="email" value=""><br />
    Zip Code: <input type="text" name="zip" value=""><br />
    Owner: <input type="text" name="owner" value=""><br />
    Phone Number: <input type="text" name="phone" value=""><br />
    <input type="submit" id="foo" name="action" value="Submit" />
    <input type="submit" id="fooy" name="action" value="Back" />
</form>
<?php

$db = dbConn();
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? "";
switch($action){
    case"Submit":
        addCorp($db, $corp, now(), $email, $zip, $owner, $phone);
        break;
    case"Back":
        header('http://localhost/lab3/corpIndex.php');

}
?>