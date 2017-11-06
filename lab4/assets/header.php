<?php
/**
 * Created by PhpStorm.
 * User: 001432637
 * Date: 11/1/2017
 * Time: 10:37 AM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!-- css links here -->
    <!-- JS links here -->

</head>
<body>
<header>
    <nav>
        <section><form method='get' action='index.php'>
                <label for='col'>Sort Column: </label>
                <select name='col' id='col'>
                    <option value='id'>id</option>
                    <option value='corp'>corp</option>
                    <option value='incorp_dt'>incorp_dt</option>
                    <option value='email'>email</option>
                    <option value='zipcode'>zipcode</option>
                    <option value='owner'>owner</option>
                    <option value='phone'>phone</option>
                </select>
                <label for='asc'>Ascending: </label>
                <input type='radio' name='dir' value='ASC' id = 'asc' />
                <label for='desc'>Descending: </label>
                <input type='radio' name='dir' value='DESC' id = 'desc' />
                <input type='hidden' name='action' value='sort' />
                <input type='submit' />
                <input type='submit' name='action' value='Reset' />
            </form></section>

        <section><form method='get' action='index.php'>
                <label for='col'>Search Column: </label>
                <select name='col' id='col'>
                    <option value='id'>id</option>
                    <option value='corp'>corp</option>
                    <option value='incorp_dt'>incorp_dt</option>
                    <option value='email'>email</option>
                    <option value='zipcode'>zipcode</option>
                    <option value='owner'>owner</option>
                    <option value='phone'>phone</option>
                </select>
                <label for='term'>Term: </label>
                <input type='text' name='term' id = 'term' />
                <input type='hidden' name='action' value='search' />
                <input type='submit' />
                <input type='submit' name='action' value='Reset' />
            </form></section>

    </nav>
</header>
<section>