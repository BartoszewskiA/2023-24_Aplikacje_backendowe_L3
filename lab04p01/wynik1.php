<!doctype html>

<html>
<?php
function losuj_pule($zakres)
{
    $pula = array();
    for ($i = 1; $i <= $zakres; $i++)
        //  $pula[]=$i;
        array_push($pula, $i);
    return $pula;
}
?>
<?php
function losuj_zaklad($zakres, $ilosc_liczb)
{
    $pula = losuj_pule($zakres);
    $wyniki = array();
    // $indeksy = array_rand($pula, $ilosc_liczb);
    //     foreach($indeksy as $indeks)
    //         $wyniki[]=$pula[$indeks];
    for ($i = 0; $i < $ilosc_liczb; $i++) {
        $indeks = array_rand($pula, 1);
        // $indeks = random_int(1,50);
        $wyniki[] = $pula[$indeks];
        unset($pula[$indeks]);
    }
    return $wyniki;
}
?>

<?php
function losuj_zestaw($pula, $ilosc_liczb, $ilosc_zakladow)
{
    $zestaw = array();
    for ($i = 0; $i < $ilosc_zakladow; $i++)
        $zestaw[] = losuj_zaklad($pula, $ilosc_liczb);

    return $zestaw;
}
?>


<head>
    <meta charset="UTF-8" />
    <title></title>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] != "POST") 
    {
        echo "Brak danych";
        return;
    }

    $ilosc_zakladow = $_POST['zaklady'];
    $gra = $_POST['gra'];
    
    if ($gra == "6z49") 
    {
        $pula = 49;
        $ilosc_liczb = 6;
    }
    else if($gra == "5z30")
    {
        $pula = 30;
        $ilosc_liczb = 5;
    }
    $zestaw = losuj_zestaw($pula, $ilosc_liczb, $ilosc_zakladow);
    //print_r($zestaw);
    
    ?>
</body>

</html>