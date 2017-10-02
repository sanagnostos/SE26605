<?php

$table = "<table>"; //empty table
for($rows=1; $rows<=5; $rows++){
    $table .= "\t<tr>";
    for($cols=1; $cols<=5; $cols++){
        $table .= "<td>" . $rows * $cols . "</td>";

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
<?php echo $table; ?>
</body>
</html>