<?php 
echo "<h1>Resultado: </h1>";

$positivos = [];
$negativos = [];

    for ($i = 1; $i <= 8; $i++) {
        $num = $_GET["n$i"];

        if ($num >= 0) {
            $positivos[] = $num;
        } else {
            $negativos[] = $num;
        }
    }

    echo "<h2>Positivos:</h2>";
echo implode(", ", $positivos);

echo "<h2>Negativos:</h2>";
echo implode(", ", $negativos);


echo '<br> <br> <a href="index.php">Voltar</a>'
?>
