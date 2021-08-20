<?php

require_once("../Entity/Products.php");
require_once("../Controller/ProductsController.php");
require_once("../Controller/ProvidersController.php");

if (isset($_REQUEST['send'])) {

    $signup = new ProductsController();
    $products = new Products();
    
    $products->setObject($_POST);
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

            <input type="submit" name="send" value="Cadastrar">
        </form>

        <i class="fas fa-reply"></i>
        <a href="./Products.php"><button type="button">Voltar</button></a>
    </div>

</body>

</html>