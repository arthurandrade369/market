<?php

require_once("../Entity/Products.php");
require_once("../Controller/ProductsController.php");

if (isset($_REQUEST['send'])) {
    $signup = new ProductsController();
    $products = new Products();
    $batches = new Batches();
    $products->setObject($_POST);
    $batches->setObject($_POST);
    $signup->newProduct($products);

    echo "<h2>Produto cadastrado com sucesso!</h2>";
}

?>

<html>

<head>
    <meta charset="utf-8">
    <title>Produtos</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>
    <div class="register">
        <h1>Produtos</h1>
        <h2>Dados do Produto:</h2>

        <form method="post" id="productForm">

            <label for="name">
                <i class="fas fa-box"></i>
            </label>
            <input type="text" name="name" placeholder="Nome do Produto" id="name" required>

            <label for="priceproduct">
                <i class="fas fa-money-bill-wave"></i>
            </label>
            <input type="number" step="0.01" name="priceproduct" placeholder="Valor do Produto" id="priceproduct" required>

            <label for="quantityinventory">
                <i class="fas fa-box"></i>
            </label>
            <input type="number" name="quantityinventory" placeholder="Quantidade em estoque" id="quantityinventory" required>

            <label for="discount">
                <i class="fas fa-money-bill-alt"></i>
            </label>
            <input type="number" step="0.01" name="discount" placeholder="Desconto (opcional)" id="discount">

            <h2>Fornecedor:</h2>

            <label for="provider">
            </label>
            <input type="text" name="provider" placeholder="Nome do Fornecedor" id="provider" required>

            <h2>Dados do Lote:</h2>
            <label for="fabricationDate">
                <b>Data de Fabricação</b>
            </label>
            <input type="date" name="fabricationDate" placeholder="Data de fabricação" id="name" required>

            <label for="expirationDate">
                <b>Data de Validade</b>
            </label>
            <input type="date" name="expirationDate" placeholder="Data de validade" id="expirationDate" required>

            <label for="entryDate">
                <b>Data de Entrada</b>
            </label>
            <input type="date" name="entryDate" placeholder="Data de entrada" id="entryDate" required>

            <label for="quantity">
            </label>
            <input type="number" name="quantity" placeholder="Quantitade de lotes" id="quantity" required>
                <h2></h2>
            <textarea name="description" id="description" cols="30" rows="4" placeholder="Descrição do produto"></textarea>
            <h2></h2>
            <input type="submit" name="send" value="Cadastrar">
        </form>

        <i class="fas fa-reply"></i>
        <a href="./Products.php"><button type="button">Voltar</button></a>
    </div>

</body>

</html>