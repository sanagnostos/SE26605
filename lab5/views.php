<?php
/**
 * Created by PhpStorm.
 * User: 001432637
 * Date: 12/8/2017
 * Time: 5:33 PM
 */

require_once ('assets/dbconn.php');
include_once ('assets/header.php');
include_once ('assets/sites.php');
echo sites($db);
echo "Select a site from the drop down list";


include_once ('assets/footer.php');