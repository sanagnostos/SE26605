<?php
/**
 * Created by PhpStorm.
 * User: 001432637
 * Date: 10/23/2017
 * Time: 7:44 AM
 */

function getCorpsAsTable($db)
{
    try {
        $sql = "SELECT * FROM corps";
        $sql = $db->prepare($sql);
        $sql->execute();

        $corps = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0) {
            $table = "<table>" . PHP_EOL;
            foreach ($corps as $corp) {
                $table .= "<tr><td>" . $corp['corp'] . "</td>";
                $table .= "<td><form method='post' action='/lab3/corpIndex.php'><input type='hidden' name='id' value='" . $corp['id'] . "' /><input type='submit' name='action' value='Read' /></form></td>";
                $table .= "<td><form method='post' action='/lab3/corpIndex.php'><input type='hidden' name='id' value='" . $corp['id'] . "' /><input type='submit' name='action' value='Update' /></form></td>";
                $table .= "<td><form method='post' action='/lab3/corpIndex.php'><input type='hidden' name='id' value='" . $corp['id'] . "' /><input type='submit' name='action' value='Delete' /></form></td>";
                $table .= "</tr>";
            }
            $table .= "</table>" . PHP_EOL;
            return $table;

        } else {
            $table = "There was no data found in the table" . PHP_EOL;
        }

    } catch (PDOException $e) {
        die("There was a problem getting the data");
    }
}
    function addCorp($db, $corp, $date, $email, $zip, $owner, $phone){
        try{
            $sql = $db->prepare("INSERT INTO corps VALUES (null, :corp, :date, :email, :zip, :owner, :phone)");

            $date = now();

            $sql->bindParam(':corp, $corp');
            $sql->bindParam(':date, $date');
            $sql->bindParam(':email, $email');
            $sql->bindParam(':zip, $zip');
            $sql->bindParam(':owner, $owner');
            $sql->bindParam(':phone, $phone');

            $sql->execute();
            return $sql->rowCount() . " row successfully added";

        }catch(PDOException $e){
            die("There was a problem adding the data");
        }

    }
    function readCorp($db, $id){
        try{
        $sql = $db->prepare("SELECT * FROM corps WHERE id = :id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();

        $row = $sql->fetchAll(PDO::FETCH_ASSOC);
        if($sql->rowCount()>0) {
            $table = "<table>" . PHP_EOL;

            $table .= "<tr><td>" . $row['corp'] . "</td>";
            $table .= "<td>" . $row['incorp_dt'] . "</td>";
            $table .= "<td>" . $row['email'] . "</td>";
            $table .= "<td>" . $row['zipcode'] . "</td>";
            $table .= "<td>" . $row['owner'] . "</td>";
            $table .= "<td>" . $row['phone'] . "</td>";
            $table .= "</tr>";

            $table .= "</table>" . PHP_EOL;
            return $table;
        }
        }catch(PDOException $e){
            die("Error");
        }
    }

