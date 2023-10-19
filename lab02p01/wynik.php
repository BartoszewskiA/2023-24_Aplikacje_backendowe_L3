<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <title></title>
</head>

<body>
    <?php

    if (!isset($_GET["imie"]) || !isset($_GET["nazwisko"]) || !isset($_GET["semestr"])) {
        echo "Brakuje niezbędnych danych <br>";
        echo "<a href='index.html'>Powrot do formularza</a>";
        return;
    }

    if (empty($_GET["imie"]) || empty($_GET["nazwisko"]) || empty($_GET["semestr"])) {
        echo "Dane nie mogą być puste <br>";
        echo "<a href='#' onclick='window.history.go(-1);'>Powrot do formularza</a>";
        return;
    }

    if (!is_numeric($_GET["semestr"]) || $_GET["semestr"] > 7 || $_GET["semestr"] < 1) {
        echo "Nieprawidłowy numer semestru, musi być liczbą z przedziału od 1 do 7. <br>";
        echo "<a href='index.html'>Powrot do formularza</a>";
        return;
    }


    $imie = $_GET["imie"];
    $nazwisko = $_GET["nazwisko"];
    $semestr = $_GET["semestr"];
    $zaliczenie = "";
    if (isset($_GET["zaliczone"]))
        $zaliczenie = "ZALICZONY";
    else
        $zaliczenie = "NIEZALICZONY";
    
    echo "<h2> Student $semestr semestr</h2>";
    echo "<p>$imie $nazwisko</p>";
    echo "<p>Semestr $zaliczenie</p>";
    ?>
</body>

</html>