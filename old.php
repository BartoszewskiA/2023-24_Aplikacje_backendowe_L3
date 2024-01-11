<!doctype html>

<?php
session_start();
$procesory = array(
    "i3" => array("nazwa" => "Intel I3 14 generacja", "doplata" => 0),
    "i5" => array("nazwa" => "Intel I5 14 generacja", "doplata" => 500),
    "i7" => array("nazwa" => "Intel I7 12 generacja", "doplata" => 550),
);
$cena_bazowa = 3000;
?>

<html>

<head>
    <meta charset="UTF-8" />
    <title></title>
</head>

<body>

    <body>
        <form method="post" action="index.php">
            <select name="procesor">
                <option value="i3">Intel i3</option>
                <option value="i5">Intel i5</option>
                <option value="i7">Intel i7</option>
            </select>
            <br><br>
            <input type="submit" value="Zapamiętaj">
        </form>
        <br><br>
        <?php
        if (isset($_POST['procesor'])) {
            $_SESSION['procesor'] = $_POST['procesor'];
        }
        if (isset($_POST['wylogowanie'])) {
            session_destroy();
        }
        ?>


        <?php
        if (isset($_SESSION['procesor'])) {
            $proc_id = $_SESSION['procesor'];
            echo "Procesor: ", $procesory[$proc_id]["nazwa"], "<br>";
            echo "Cena: ", $cena_bazowa + $procesory[$proc_id]["doplata"], "<br>";
        }
        ?>

        <br><br>
        <form method="post" action="index.php">
            <input type="hidden" name="wylogowanie" value="true">
            <input type="submit" value="Wyloguj się">
        </form>


    </body>

</html>