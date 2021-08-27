<?php
require_once("../Controller/BatchesController.php");
require_once("../Controller/ProductsController.php");

$batches = new BatchesController();

if (isset($_REQUEST['product_name']) and !empty($_REQUEST['product_name'])) {

    $aws = $batches->searchBatchesByProductName($_POST['product_name']);
} else {

    $aws = $batches->getAllBatches();
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

        <input type="submit" name="send" value="Confirmar">
    </form>

    <table style="width:100%">
        <thead>
            <tr>
                <th>Id do Lote</th>
                <th>Id do Produto</th>
                <th>Nome do Produto</th>
                <th>Data de Fabricação</th>
                <th>Data de Validade</th>
                <th>Data de Entrada</th>
                <th>Quantidade por lote</th>
                <th>Em Uso</th>
                <th>Esgotado</th>
                <th>Descrição do Lote</th>
                <th>Nome do Fornecedor</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($aws as $value) {
                $used = $value['used'] == 1 ? 'Sim' : 'Não';
                $soldOff = $value['sold_off'] == 1 ? 'Sim' : 'Não';

                echo "
                    <tr>    
                        <td>" . $value['id'] . "</td>
                        <td>" . $value['products_id'] . "</td>
                        <td>" . $value['pd_name'] . "</td>
                        <td>" . $value['fabrication_date'] . "</td>
                        <td>" . $value['expiration_date'] . "</td>
                        <td>" . $value['entry_date'] . "</td>
                        <td>" . $value['quantity'] . "</td>
                        <td>" . $used . "</td>
                        <td>" . $soldOff . "</td>
                        <td>" . $value['description'] . "</td>
                        <td>" . $value['pv_name'] . "</td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
    <h2></h2>
    <i class="fas fa-reply"></i>
    <a href="./Products.php"><button type="button">Voltar</button></a>
</body>

</html>