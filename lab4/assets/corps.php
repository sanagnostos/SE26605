<?php
/**
 * Created by PhpStorm.
 * User: 001432637
 * Date: 10/23/2017
 * Time: 7:44 AM
 */


function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}
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

    function delCorp($db, $id){
        try {

            $sql = $db->prepare("DELETE FROM corps WHERE id = :id");
            $sql->bindParam(':id', $id, PDO::PARAM_INT);
            $sql->execute();

            echo "Record number " . $id . " was deleted successfully.";
        } catch (PDOException $e) {
            die("Could not delete the data");
        }
    }
    function addCorp($db, $corp, $email, $zipcode, $owner, $phone){

    try{
            $sql = $db->prepare("INSERT INTO corps VALUES (null, :corp, NOW(), :email, :zipcode, :owner, :phone)");

            $sql->bindParam(':corp', $corp);
            $sql->bindParam(':email', $email);
            $sql->bindParam(':zipcode', $zipcode);
            $sql->bindParam(':owner', $owner);
            $sql->bindParam(':phone', $phone);

            $sql->execute();
            return $sql->rowCount() . " row successfully added";

        }catch(PDOException $e){
            die("There was a problem adding the data");
        }

    }
    function updateCorp($db, $id){

        if (isPostRequest()) {

    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? "";
    $corp = filter_input(INPUT_POST, 'corp', FILTER_SANITIZE_STRING) ?? "";
    // $incorp_dt = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? "";
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
    $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";
    $owner = filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) ?? "";

    $sql = $db->prepare("UPDATE corps set $corp = :corp, $email = :email, $zipcode = :zipcode, $owner = :owner, $phone = :phone where id = :id");

    $sql->bindParam(':corp', $corp);
    $sql->bindParam(':email', $email);
    $sql->bindParam(':zipcode', $zipcode);
    $sql->bindParam(':owner', $owner);
    $sql->bindParam(':phone', $phone);

    $sql->execute();

    if ($sql->execute() && $sql->rowCount() > 0) {
        $result = 'Record updated';
    }
} else {
    $id = filter_input(INPUT_GET, 'id');
    $sql = $db->prepare("SELECT * FROM corps where id = :id");
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();
    if ($sql->execute() && $sql->rowCount() > 0) {
        $results = $sql->fetch(PDO::FETCH_ASSOC);
    }
    if ( !isset($id) ) {
        die('Record not found');
    }

}

?>



<form method="post" action="#">
    Corporation: <input type="text" value="<?php echo $corp; ?>" name="corp" />
    <br />
    Email: <input type="text" value="<?php echo $email; ?>" name="email" />
    <br />
    Zip Code: <input type="text" value="<?php echo $zipcode; ?>" name="zip" />
    <br />
    Owner: <input type="text" value="<?php echo $owner; ?>" name="owner" />
    <br />
    Phone Number: <input type="text" value="<?php echo $phone; ?>" name="phone" />
    <br />
    <input type="hidden" value="<?php echo $id; ?>" name="id" />
    <input type="submit" value="Update" />
</form>
<?php
        echo "<a href='/lab3/corpIndex.php'>" . 'View All' . "</a>";

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
