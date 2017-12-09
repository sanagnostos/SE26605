<?php
/**
 * Created by PhpStorm.
 * User: 001432637
 * Date: 12/8/2017
 * Time: 5:33 PM
 */
include ('assets/control.php');
include_once ('assets/header.php');
?>

<form method="post" action="#">
    <input type="text" placeholder="URL" name="site" value="<?php if (isset($_POST['site'])) echo $_POST['site']; ?>">
    <input type="submit" name="action" value="Add">
</form>
<?php
include_once ('assets/footer.php');
?>