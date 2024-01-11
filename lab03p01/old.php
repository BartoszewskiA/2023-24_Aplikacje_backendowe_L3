<!doctype html>
<html>

<head>
  <meta charset="UTF-8" />
  <title></title>
</head>

<body>
  <?php
  if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo  "<form action=\"index.php\" method=\"post\">";
    echo '<label for="liczba_pol">Liczba pól tabeli: </label>';
    echo '<input type="number" name="liczba_pol" max="7" min="1">';
    echo '<input type="submit" value="Wprowadź dane">';
    echo '</form>';
  } else {
    if(isset($_POST["liczba_pol"]) && $_POST["liczba_pol"] > 0)
    {
      $ile = $_POST["liczba_pol"];

      echo '<form action="wynik.php" method="post">';

      for( $i=0; $i<$ile; $i++)
      {
        echo "<label for=\"tab[]\">Pole $i: </label>";
        echo "<input type=\"tekst\" name=\"tab[]\"><br><br>";
      }

      echo "<input type=\"submit\" value=\"Wyślij dane\">";
      echo "</form>";
    }
    else
    {
      echo "<p>Brak danych</p>";
    }


  }

  ?>




</body>

</html>