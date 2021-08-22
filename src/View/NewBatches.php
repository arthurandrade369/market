<?php

require_once("../Entity/Batches.php");
require_once("../Controller/BatchesController.php");

if (isset($_REQUEST['send'])) {

    $signup = new BatchesController();
    $batches = new Batches();

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
                $sql = "
                    SELECT
                        *
                    FROM
                        products
                    ";
                $pSql = Connection::getInstance()->prepare($sql);
                $pSql->execute();
                if ($pSql->rowCount() > 0) {
                    while ($product = $pSql->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$product['id']}'>{$product['name']}</option>";
                    }
                }
                ?>
            </select>

            <!-- <input type="text" name="name" placeholder="Nome do Produto" id="name" required> -->

            <h1></h1>

            <label for="provider">
                <i class="fas fa-user"></i>
            </label>
            <select name="provider" id="provider">
                <?php
                $sql = "
                SELECT
                    *
                FROM
                    providers
                ";
                $pSql = Connection::getInstance()->prepare($sql);
                $pSql->execute();
                if ($pSql->rowCount() > 0) {
                    while ($provider = $pSql->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$provider['id']}'>{$provider['name']}</option>";
                    }
                }
                ?>
            </select>

            <!-- <input type="text" name="provider" placeholder="Nome do Fornecedor" id="provider" required> -->

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