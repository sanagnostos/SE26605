<?php
/**
 * Created by PhpStorm.
 * User: 001432637
 * Date: 10/18/2017
 * Time: 10:04 AM
 */
?>
<form method="post" action="#">
    First Name: <input type="text" name="firstName" value="<?php $actor ['firstName']; ?>" /><br />
    Last Name: <input type="text" name="lastName" value="" /><br />
    Date of Birth: <input type="text" name="dob" value="" /><br />
    Height: <input type="text" name="height" value="" /><br />
    <input type="submit" id="foo" name="submit" value="<?php echo $button; ?>" />
</form>
