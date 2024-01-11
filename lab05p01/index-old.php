<!doctype html>
<html>
<?php
$nazwa_pliku = "lista.txt";
// define("nazwa_pliku", "lista.txt");
?>
<?php
if (!file_exists($nazwa_pliku)) {
    $plik = fopen($nazwa_pliku, "w");
    fclose($plik);
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["nazwa"])) {

    $plik = fopen($nazwa_pliku, "r");
    $stare_dane = fread($plik, filesize($nazwa_pliku));
    fclose($plik);

    $noweDane = $_GET["nazwa"] . " : " . $_GET["sztuk"] . "\n";

    $noweDane .= $stare_dane;
    $plik = fopen($nazwa_pliku, "w");
    fwrite($plik, $noweDane);
    fclose($plik);
}
?>

<head>
    <meta charset="UTF-8" />
    <title></title>
</head>

<body>
    <h1>Lista zakupów:</h1>
    <?php
    if (filesize($nazwa_pliku) > 0) {
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
    <form action="form.php">
        <?php echo "<input type=\"hidden\" name=\"plik\" value=\"$nazwa_pliku\"/>" ?>

        <input type="submit" value="+" />
    </form>
</body>

</html>