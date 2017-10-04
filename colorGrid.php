<?php

//$arr = []; ----------- don't need array with dechex
$table = "<table>"; //empty table


/*$hex1 = dechex(mt_rand(0, 15));
$hex2 = dechex(mt_rand(0, 15));
$hex3 = dechex(mt_rand(0, 15));
$hex4 = dechex(mt_rand(0, 15));
$hex5 = dechex(mt_rand(0, 15));
$hex6 = dechex(mt_rand(0, 15));*/


/*for($i=0; $i<100; $i++){
    $hex1 = dechex(mt_rand(0, 15));
    $hex2 = dechex(mt_rand(0, 15));
    $hex3 = dechex(mt_rand(0, 15));
    $hex4 = dechex(mt_rand(0, 15));
    $hex5 = dechex(mt_rand(0, 15));
    $hex6 = dechex(mt_rand(0, 15));

    $hex = $hex1 . $hex2 . $hex3. $hex4. $hex5. $hex6;

    $arr[] = $hex;


}*/

for($rows=0; $rows<10; $rows++){
    $table .= "\t<tr>";
    for($cols=0; $cols<=10; $cols++){

        //create 6 random hexes
        $hex1 = dechex(mt_rand(0, 15));
        $hex2 = dechex(mt_rand(0, 15));
        $hex3 = dechex(mt_rand(0, 15));
        $hex4 = dechex(mt_rand(0, 15));
        $hex5 = dechex(mt_rand(0, 15));
        $hex6 = dechex(mt_rand(0, 15));

        //concatinate hexes
        $hex = $hex1 . $hex2 . $hex3. $hex4. $hex5. $hex6;

        //insert color and hex in black and white into td
        $table .= "<td style='background-color: #$hex;'>" . $hex . "<br/>" . "<span style='color:#ffffff;' >". $hex . "</span>" . "</td>";

    }
    $table .= "</tr>\n";
}

$table .= "</table>";


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php echo $table ?>
</body>
</html>