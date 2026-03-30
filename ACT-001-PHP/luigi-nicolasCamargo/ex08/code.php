<?php
echo "<h1>Resultado: </h1>";

$n = $_GET["n"];
function soma($n) {
    $resultado = 0;
    $conta = " ";
    for ($i = 0; $i <= $n; $i++) {
        $resultado += $i;

        if ($i < $n) {
            $conta = $conta . $i . " + ";
        } 
        else {
            $conta = $conta . $i;
        }
    }
    

    return $conta . " = " . $resultado;
}

echo soma($n);

echo '<br> <br> <a href="index.php">Voltar</a>'

?>
