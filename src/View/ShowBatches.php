<?php
require_once("../Controller/BatchesController.php");
require_once("../Controller/ProductsController.php");

$batches = new BatchesController();

if (
    isset($_REQUEST['providers_name']) and isset($_REQUEST['product_name']) and !empty($_REQUEST['product_name']) and !empty($_REQUEST['product_name'])
) {
    $aws = $batches->catchBatchesByProviderNameAndProductName($_REQUEST['product_name'], $_REQUEST['provider_name']);
    if($aws){

    } else {
        echo "<h2>Lote não existe</h2>";
    } 
} else if (isset($_REQUEST['product_name']) and !empty($_REQUEST['product_name'])) {

    $aws = $batches->catchBatchesByProductName($_POST['product_name']);
    if ($aws) {
        //
    } else {
        echo "<h2>Lote não existe!</h2>";
    }
} else if (isset($_REQUEST['provider_name']) and !empty($_REQUEST['product_name'])) {
    $aws = $batches->catchBatchesByProviderName($_REQUEST['provider_name']);
    if ($aws) {
        //
    } else {
        echo "<h2>Fornecedor não existe!</h2>";
    }
} else {

    $aws = $batches->catchAllBatches();
    if ($aws) {
        //
    } else {
        echo "<h2>Nâo existem lotes cadastrados!</h2>";
    }
}
?>

<html>

<head>
    <meta charset="utf-8">
    <title>Produtos</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
            text-align: left;
        }
    </style>
</head>

<body>
    <form method="post">
        <label for="product_name">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="product_name" placeholder="Buscar Produto" id="product_name">

        <label for="provider_name">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="provider_name" placeholder="Buscar Fornecedor" id="provider_name">

        <input type="submit" name="send" value="Confirmar">
    </form>

    <table style="width:100%">
        <tr>
            <td>Id do Lote</td>
            <td>Id do Produto</td>
            <td>Nome do Produto</td>
            <td>Data de Fabricação</td>
            <td>Data de Validade</td>
            <td>Data de Entrada</td>
            <td>Quantidade por lote</td>
            <td>Em Uso</td>
            <td>Esgotado</td>
            <td>Descrição do Lote</td>
            <td>Nome do Fornecedor</td>

        </tr>
        <tr>
            <td><?php if ($aws) {
                    foreach ($aws as $value) {
                        echo $value['id'] . "<br>";
                    }
                } ?></td>

            <td><?php if ($aws) {
                    foreach ($aws as $value) {
                        echo $value['products_id'] . "<br>";
                    }
                } ?></td>

            <td><?php if ($aws) {
                    foreach ($aws as $value) {
                        echo $value['pd_name'] . "<br>";
                    }
                } ?></td>

            <td><?php if ($aws) {
                    foreach ($aws as $value) {
                        echo $value['fabrication_date'] . "<br>";
                    }
                } ?></td>

            <td><?php if ($aws) {
                    foreach ($aws as $value) {
                        echo $value['expiration_date'] . "<br>";
                    }
                } ?></td>

            <td><?php if ($aws) {
                    foreach ($aws as $value) {
                        echo $value['entry_date'] . "<br>";
                    }
                } ?></td>

            <td><?php if ($aws) {
                    foreach ($aws as $value) {
                        echo $value['quantity'] . "<br>";
                    }
                } ?></td>

            <td><?php if ($aws) {
                    foreach ($aws as $value) {
                        if ($value['used']) echo "Sim <br>";
                        else echo "Não <br>";
                    }
                } ?></td>

            <td><?php if ($aws) {
                    foreach ($aws as $value) {
                        if ($value['sold_off']) echo "Sim <br>";
                        else echo "Não <br>";
                    }
                } ?></td>

            <td><?php if ($aws) {
                    foreach ($aws as $value) {
                        echo $value['description'] . "<br>";
                    }
                } ?></td>

            <td><?php if ($aws) {
                    foreach ($aws as $value) {
                        echo $value['pv_name'] . "<br>";
                    }
                } ?></td>

        </tr>
    </table>
    <h2></h2>
    <i class="fas fa-reply"></i>
    <a href="./Products.php"><button type="button">Voltar</button></a>
</body>

</html>