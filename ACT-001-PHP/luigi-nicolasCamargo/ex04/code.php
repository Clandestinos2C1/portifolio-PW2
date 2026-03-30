<?php
$n = $_GET["numb"];
echo "<h1>Resultado: </h1>";

for ($i = 1; $i <= $n; $i++) {
    for ($x = 1; $x <= $i; $x++) {
        echo "$x ";
    }
    echo "<br>";

}

echo '<br> <br> <a href="index.php">Voltar</a>'
?>
