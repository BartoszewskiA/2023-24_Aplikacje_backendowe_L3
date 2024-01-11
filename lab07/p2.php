<!doctype html>
<?php
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
    <form method="post" action="p2.php">
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
        $proc_id =  $_POST['procesor'];
        setcookie('procesor', $proc_id, time()+ 60*60*24*30);
    }
    if (isset($_POST['wyloguj'])) {
        setcookie('procesor');
    }
    ?>
    <?php
    if (isset($_COOKIE['procesor'])) {
        $proc_id = $_COOKIE['procesor'];
        echo "Procesor: ", $procesory[$proc_id]['opis'], "<br>";
        echo "Cena: ", $cena_bazowa + $procesory[$proc_id]['doplata'], "<br>";
    }
    else if(isset($_POST['procesor']))
    {
        $proc_id = $_POST['procesor'];
        echo "Procesor: ", $procesory[$proc_id]['opis'], "<br>";
        echo "Cena: ", $cena_bazowa + $procesory[$proc_id]['doplata'], "<br>";
    }
    ?>
    <br>
    <form method="post" action="p2.php">
        <input type="hidden" name="wyloguj" value="true">
        <input type="submit" value="Wyloguj się">
    </form>
</body>

</html>