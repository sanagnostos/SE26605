<?php
/**
 * Created by PhpStorm.
 * User: 001432637
 * Date: 10/11/2017
 * Time: 9:45 AM
 */

// $submit = isset($_GET['submit']) ? $_GET['submit'] : "";
$dsn = "mysql:host=localhost;dbname=dogs";
$username = "dogs";
$password = "se266";
$db = new PDO($dsn, $username, $password);

try{
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $submit = $_GET['submit'] ?? "";//null coalesce
    if ($_GET['submit'] == "Do it"){
        $name = $_GET['name'] ?? "";
        $gender = $_GET['gender'] ?? "";
        $fixed = $_GET['fixed'] ?? false;

        $sql = $db->prepare("INSERT INTO dogs VALUES (null, :name, :gender, :fixed)");//set placeholder

        //binding variables to placeholders
        $sql->bindParam(':name', $name);
        $sql->bindParam(':gender', $gender);
        $sql->bindParam(':fixed', $fixed);

        $sql->execute();

        echo $sql->rowCount() . " rows inserted";
    }
} catch (PDOException $e) {
    die("You could not connect to the database.");
}



?>

<form method="get" action="#">
    <input type="text" name="name" value="" /><br />
    <input type="radio" name="gender" value="m" /><br />
    <input type="radio" name="gender" value="f" /><br />
    <input type="checkbox" name="fixed" value="true" /><br />
    <input type="submit" id="foo" name="submit" value="Do it" />
</form>

<?php
    $sql = "SELECT * FROM dogs";
    $sql->execute();
    $results = $sql->fetchAll(PDO::FETCH_ASSOC);
    if(count($results)){
        foreach ($results as $dog){
            print_r($dog);
        }

    }
?>