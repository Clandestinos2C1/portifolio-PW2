<?php

$N1 = $_GET["N1"];

if ($N1 > 100 && $N1 < 200) {
    $resultado = "O número $N1 está entre 100 e 200";
} else {
    $resultado = "O número $N1 não está entre 100 e 200";
}

echo "<h1>Resultado: </h1>";
echo $resultado;
echo '<br> <br> <a href="index.php">Voltar</a>'
?>
