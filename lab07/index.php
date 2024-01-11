<!doctype html>
<?php
session_start();
$procesory = array(
    "i3" => array("opis" => "Intel i3 14 generacji", "doplata" => 0),
    "i5" => array("opis" => "Intel i5 14 generacji", "doplata" => 400),
    "i7" => array("opis" => "Intel i7 13 generacji", "doplata" => 450),
);
$cena_bazowa = 3000;
?>
<html>

<head>
    <meta charset="UTF-8" />
    <title></title>
</head>

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
    if(isset($_POST['wyloguj'])){
        session_destroy();
    }
    ?>
    <?php
    if (isset($_SESSION['procesor'])) {
        $proc_id = $_SESSION['procesor'];
        echo "Procesor: ", $procesory[$proc_id]['opis'], "<br>";
        echo "Cena: ", $cena_bazowa + $procesory[$proc_id]['doplata'], "<br>";
    }
    ?>
    <br>
    <form method="post" action="index.php">
        <input type="hidden" name="wyloguj" value="true">
        <input type="submit" value="Wyloguj się">
    </form>
</body>

</html>