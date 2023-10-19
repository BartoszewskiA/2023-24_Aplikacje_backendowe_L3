<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <title></title>
</head>

<body>

    <?php
    if (isset($_GET['a'])) {
        $a = $_GET['a'];
        $b = $_GET['b'];
        $c = $_GET['c'];
        if (is_numeric($a) && is_numeric($b) && is_numeric($c)) {
            $delta = $b * $b - 4 * $a * $c;
            echo "delta=" . round($delta, 3) . "<br>";
            if ($delta > 0) {
                $x1 = (-$b - sqrt($delta)) / (2 * $a);
                $x2 = (-$b + sqrt($delta)) / (2 * $a);
                echo "x1=" . round($x1, 3) . "<br>";
                echo "x2=" . round($x2, 3) . "<br>";
            } elseif ($delta == 0) {
                $x0 = (-$b) / (2 * $a);
                echo "x0=" . round($x0, 3) . "<br>";
            } else {
                echo "Brak rozwiązań<br>";
            }
        } else {
            echo "brak danych";
        }
    } else
    {
        echo  
        '<form action="" method="get">';
        echo
        '<label for="a">a:</label>';
        echo
        '<input type="number" name="a" required><br>';
        echo
        '<label for="b">b:</label>';
        echo
        '<input type="number" name="b" required><br>';
        echo
        '<label for="c">c:</label>';
        echo
        '<input type="number" name="c" required><br>';
        echo
        '<input type="submit" />';
        echo
        '</form>';
    }
    ?>

    </form>
</body>

</html>