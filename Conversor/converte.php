<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Conversor de REAL > DOLAR com API</title>
</head>

<body>
    <?php
    $dados = file_get_contents("https://economia.awesomeapi.com.br/last/USD-BRL");
    $dados = json_decode($dados, true);

    $arrayDados = $dados['USDBRL'];
    $valorDolar = $arrayDados["bid"];
    $valorDolarAtual = floatval($valorDolar);
    ?>


    <section>

        <h1>Conversor de Real para Dólar v2.0</h1>
        <?php
        $valor = $_GET["valor"];
        $res = $valor / $valorDolarAtual;
        $valorReal = number_format($valor, 2, ',');
        $resReal = number_format($res, 2, ',');
        $valorDolarAtual = number_format($valorDolarAtual, 2, ',');
        echo "Seus R$ $valorReal equivalem a US$ $resReal"
        ?>
        <p>*Cotação atual R$ <strong><?php echo $valorDolarAtual; ?></strong></p>
        <a href="index.html"><input type="submit" value="Voltar"></a>
    </section>

</body>

</html>