<?php
/**
 * Created by PhpStorm.
 * User: 001432637
 * Date: 10/18/2017
 * Time: 10:09 AM
 */

function getActorsAsTable($db){
    try {
        $sql = "SELECT * FROM actors";
        $sql = $db->prepare($sql);
        $sql->execute();

        $actors = $sql->fetchAll(PDO::FETCH_ASSOC);
        if($sql->rowCount()>0){
            $table = "<table>" . PHP_EOL;
            foreach($actors as $actor){
                $table .= "<tr><td>" . $actor['firstName'] . "</td><td>" . $actor['lastName'] . "</td><td>" . $actor['dob'] . "</td><td>" . $actor['height'] . "</td>";
                $table .= "<td><form method='post' action='#'><input type='hidden' name='id' value='" . $actor['id'] . "' /><input type='submit' name='action' value='Edit' /></form></td>";
                $table .= "<td><form method='post' action='#'><input type='hidden' name='id' value='" . $actor['id'] . "' /><input type='submit' name='action' value='Delete' /></form></td>";
                $table .= "</tr>";

            }
            $table .= "</table>" . PHP_EOL;
            return $table;
        }else{
            $table = "There is no data in the table" . PHP_EOL;
        }
    }catch(PDOException $e){
        die("There was a problem getting the data");
    }
    
    function addActor($db, $firstName, $lastName, $dob, $height){

    }
}
