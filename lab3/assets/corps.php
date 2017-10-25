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
                $table .= "<td><a href='?action=Read&id=" . $corp['id'] . "'>Read</a>";
                $table .= "<td><a href='?action=Update&id=" . $corp['id'] . "'>Update</a>";
                $table .= "<td><a href='?action=Delete&id=" . $corp['id'] . "'>Delete</a>";
                $table .= "</tr>";
            }
            $table .= "<a href='/lab3/assets/create.php'>" . 'Add' . "</a>";
            $table .= "</table>" . PHP_EOL;
            return $table;

        } else {
            $table = "There was no data found in the table" . PHP_EOL;
        }

    } catch (PDOException $e) {
        die("There was a problem getting the data");
    }
}
    function addCorp($db){

    try{
            $sql = $db->prepare("INSERT INTO corps VALUES (null, :corp, now(), :email, :zip, :owner, :phone)");

            $sql->bindParam(':corp, $corp');
            $sql->bindParam(':date, $date');
            $sql->bindParam(':email, $email');
            $sql->bindParam(':zip, $zip');
            $sql->bindParam(':owner, $owner');
            $sql->bindParam(':phone, $phone');

            $sql->execute();
            echo $sql->rowCount() . " row successfully added";

        }catch(PDOException $e){
            die("There was a problem adding the data");
        }

    }
    function readCorp($db, $id){


        try{
        $sql = $db->prepare("SELECT * FROM corps WHERE id = :id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();

        $row = $sql->fetch(PDO::FETCH_ASSOC);
        $table="<table>";
        $table .= "<tr><td>" . $row['corp'];
        $table .= "</td><td>" . $row['incorp_dt'];
        $table .= "</td><td>" . $row['email'];
        $table .= "</td><td>" . $row['zipcode'];
        $table .= "</td><td>" . $row['owner'];
        $table .= "</td><td>" . $row['phone'];
        $table .= "</td></tr>";
        $table .= "</table>" . PHP_EOL;
        echo $table;
        }catch(PDOException $e){
            die("Error");
        }
    }
?>
