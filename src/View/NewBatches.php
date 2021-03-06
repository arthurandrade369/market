<?php

require_once("../Entity/Batches.php");
require_once("../Controller/BatchesController.php");
require_once("../Controller/ProvidersController.php");
require_once("../Controller/ProductsController.php");

$signup = new BatchesController();
$batches = new Batches();
$product = new ProductsController();
$provider = new ProvidersController();

if (isset($_REQUEST['send'])) {

    $batches->setObject($_POST);
    $signup->newBatch($batches);

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
        <h1>Lote de Produtos</h1>
        <h2>Dados do lote:</h2>

        <form method="post" id="productForm">

            <label for="name">
                <i class="fas fa-box"></i>
            </label>

            <select name="product" id="product">
                <?php
                $products = $product->getAllProducts();

                //Getting the option through database
                if ($products) {
                    foreach($products as $values){
                        echo "<option value='{$values['id']}'>{$values['name']}</option>";
                    }
                }
                ?>
            </select>

            <h1></h1>

            <label for="provider">
                <i class="fas fa-user"></i>
            </label>
            <select name="provider" id="provider">
                <?php
                $providers = $provider->getAllProviders();

                //Getting the option through database
                if ($providers) {
                    foreach ($providers as $values) {
                        echo "<option value='{$values['id']}'>{$values['name']}</option>";
                    }
                }
                ?>
            </select>

            <h1></h1>

            <label for="fabricationDate">
                <strong>Data de Fabricação</strong>
            </label>
            <input type="date" name="fabricationDate" id="fabricationDate" required>

            <label for="expirationDate">
                <strong>Data de Validade</strong>
            </label>
            <input type="date" name="expirationDate" id="expirationDate">

            <label for="entryDate">
                <strong>Data de Entrada</strong>
            </label>
            <input type="date" name="entryDate" id="entryDate" required>

            <label for="quantity">
                <strong>Quantidade de produtos</strong>
            </label>
            <input type="number" name="quantity" placeholder="Quantidade" id="quantity" required>

            <h1></h1>

            <textarea name="description" id="description" placeholder="Descrição do lote" cols="20" rows="5"></textarea>

            <h1></h1>

            <input type="submit" name="send" value="Cadastrar">

        </form>

        <i class="fas fa-reply"></i>
        <a href="./Products.php"><button type="button">Voltar</button></a>
    </div>

</body>

</html>