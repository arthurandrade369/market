<?php

require_once("../Entity/Buy.php");
require_once("../Controller/BuyController.php");

$signup = new BuyController;
$buy = new Buy;

$buy->setObject($_POST);
$signup->newBuy($buy);

?>

<html>

<head>
    <meta charset="utf-8">
    <title>Compras</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>
    <div class="register">
        <h1>Compras</h1>
        <h2>Dados da Compra:</h2>

        <form method="post" id="productForm">

            <label for="state">
                <strong>Situação</strong>
            </label>
            <select name="state" id="state">
                <option value="Cancelado">Cancelado</option>
                <option value="Pendente">Pendente</option>
                <option value="Concluido">Concluido</option>
            </select>

            <label for="was_paid">
                <strong>Pagamento efetuado</strong>
            </label>
            <select name="was_paid" id="was_paid">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>

            <label for="state">
                <strong>Método de pagamento</strong>
            </label>
            <select name="state" id="state">
                <option value="Boleto Bancário">Boleto Bancário</option>
                <option value="Cartao de Crédito">Cartão de Crédito</option>
                <option value="Cartão de Débito">Cartão de Débito</option>
                <option value="Transferência Báncaria">Transferência Báncaria</option>
                <option value="Pix">Pix</option>
            </select>

            <label for="discount">
                <strong>Desconto</strong> R$
            </label>
            <input type="number" step="0.01" name="discount" placeholder="Desconto total" id="discount">

            <label for="shipping">
                <strong>Frete</strong> R$
            </label>
            <input type="number" step="0.01" name="shipping" placeholder="Valor do frete" id="discount" required>


            <h2></h2>

            <input type="submit" name="send" value="Cadastrar">
        </form>

        <i class="fas fa-reply"></i>
        <a href="./Buy.php"><button type="button">Voltar</button></a>
    </div>

</body>

</html>