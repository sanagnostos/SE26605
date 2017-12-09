<?php
/**
 * Created by PhpStorm.
 * User: 001432637
 * Date: 12/8/2017
 * Time: 5:36 PM
 */
$db = dbconn();
function addWebsite($db, $site){

    try{
        $sql = $db->prepare("INSERT INTO sites VALUES (null, :site, NOW())");
        $sql->bindParam(':site', $site, PDO::PARAM_STR);
        $sql->execute();

        $lastID = $db->lastInsertID();
        echo("Added site with ID: $lastID");

        $file = file_get_contents("$site");
        preg_match_all('/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/', $file, $matched, PREG_OFFSET_CAPTURE);

        foreach($matched as $m){
            foreach($m as $match){
                addLink($db, $lastID, $match[0]);
            }
        }
        return $sql->rowCount();
    }catch(PDOException $e){
        die("Could not enter the data");
    }


}

function addLink($db, $id, $match){

    try{
        $sql = $db->prepare("INSERT INTO sitelinks (site_id, link) VALUES (:id, :link)");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->bindParam(':link', $match, PDO::PARAM_STR);
        $sql->execute();
        return $sql->rowCount();

    }catch(PDOException $e){
        die("There was a problem adding the link");
    }


}
function sites($db)
{
    try {
        $sql = $db->prepare("SELECT * FROM sites");
        $sql->execute();
        $sites = $sql->fetchAll(PDO::FETCH_ASSOC);

        if ($sql->rowCount() > 0) {
            $form = "<form method='get' action='#'>" . PHP_EOL . "<select name='site_id'><option value='default'>Select a Website</option>";

            foreach ($sites as $site) {
                $form .= "<option value='" . $site['site_id'] . "'>" . $site['site'] . "</option>";
            }
            $form .= "</select><input type='submit' name='action' value='Search'></form>";
            return $form;
        }

    } catch (PDOException $e) {
        die("ERROR");
    }
}


function checkWebsite($db, $site){
    $sql = $db->prepare("SELECT * FROM sites WHERE site=:site");
    $sql->bindParam(':site', $site, PDO::PARAM_STR);
    $sql->execute();

    if($sql->rowCount()>0){
        $valid=false;
    }
    else{
        $valid=true;
    }
    return $valid;
}

