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
    <a href="/lab3/corpIndex.php">View All</a>
    <input type="hidden" value="<?php echo $id; ?>" name="id" />
    <input type="Submit" value="Submit" />

</form>
<?php
require_once("dbconn.php");
include("corps.php");

$db = dbConn();
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?? "";
switch($action) {
    case"Submit":
        echo addCorp($db);
        break;
}
?>