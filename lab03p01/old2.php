<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <title></title>
    <link rel="stylesheet" type="text/css" href="styl.css">
</head>

<body>
    <?php
    $tablica = $_POST['tab'];
    if (is_array($tablica) && (count($tablica) > 0)) {
        echo "<table>";
        echo " <tr><th>Klucz</th><th>Wartość</th></tr>";
        foreach ($tablica as $klucz => $wartosc) {
            if (!empty($wartosc)) {
                echo "<tr>";
                echo "<td>$klucz</td><td><i>$wartosc</i></td>";
                echo "</tr>";               
            }
        }
        echo "</table>";
    } else {
        echo "<i>pusty lub nieprawidłowy</i>";
    }
    ?>

</body>

</html>