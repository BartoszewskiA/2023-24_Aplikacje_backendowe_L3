<!doctype html>

<?php

function losuj_pule($pula)
{
    $tablica = array();
    for ($i = 1; $i <= $pula; $i++)
        //    $tablica[] = $i;
        array_push($tablica, $i);
    return $tablica;
}
function losuj_zaklad($pula, $ile_liczb)
{
    $wylosowane = array();

    $tablica = losuj_pule($pula);
    // $indeksy = array_rand($tablica, $ile_liczb);
    // foreach($indeksy as $indeks)
    //     $wylosowane[] = $tablica[$indeks];
    for ($i = 0; $i < $ile_liczb; $i++) {
        $indeks = array_rand($tablica, 1);
        //$indeks = random_int(1,50);
        $wylosowane[] = $tablica[$indeks];
        unset($tablica[$indeks]);
    }
    return $wylosowane;
}

function losuj_zestaw($pula, $ile_liczb, $ile_zestawow)
{
    $zestawy = array();
    for ($i = 0; $i < $ile_zestawow; $i++)
        $zestawy[] = losuj_zaklad($pula, $ile_liczb);
    return $zestawy;
}

?>


<head>
    <meta charset="UTF-8" />
    <title></title>
    <link rel="stylesheet" type="text/css"
          href="styl.css">
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        echo "Brak danych";
        return;
    }

    $ilosc_zakladow = $_POST['zaklady'];
    $gra = $_POST['gra'];

    if ($gra == "6z49") {
        $pula = 49;
        $ilosc_liczb = 6;
    } else if ($gra == "5z30") {
        $pula = 30;
        $ilosc_liczb = 5;
    }
    $zestaw = losuj_zestaw($pula, $ilosc_liczb, $ilosc_zakladow);

    echo "<table>";
    for ($i = 0; $i < $ilosc_zakladow; $i++) {
        echo "<tr>";
        for ($ii = 0; $ii < $ilosc_liczb; $ii++) {
            echo "<td>";
            echo $zestaw[$i][$ii];
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
  
    ?>
</body>

</html>