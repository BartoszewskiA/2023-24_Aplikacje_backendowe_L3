<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <title></title>
</head>

<body>
    <h1>Dodaj element:</h1>
    <?php
    $nazwa_pliku = $_GET["nazwa"];
    if(filesize($nazwa_pliku)>0)
    {
        $plik = fopen($nazwa_pliku, "r");
        flock($plik, LOCK_SH);
        echo "<ol>";
        while (!feof($plik)) {
            echo "<li>", fgets($plik), "</li>";
        }
        echo "</ol>";
        flock($plik, LOCK_UN);
        fclose($plik);
    }
    ?>

    <form action="index.php">
        <input type="text" name="nazwa" /><br>
        <input type="number" name="sztuk" /><br>
        <input type="submit" value="Dodaj" />
    </form>
</body>

</html>