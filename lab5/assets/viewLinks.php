<?php
/**
 * Created by PhpStorm.
 * User: 001432637
 * Date: 12/8/2017
 * Time: 7:59 PM
 */
function viewLinks($db, $id){
    $sql = $db->prepare("SELECT * FROM sites JOIN sitelinks ON sites.site_id = sitelinks.site_id WHERE sites.site_id = :id");
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();

    $sites = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo "Links from " . $sites[0]['site'] . "from " . $sites[0]["date"];

    $tableView = "<section><table><tbody>";
    foreach($sites as $site) {
        $tableView .= "<tr><td><a href='" . $site['link'] . "' target='_blank'>" . $site['link'] . "</a></td></tr>";
    }
    $tableView .= "</tbody></table></section>";
    return $tableView;
}