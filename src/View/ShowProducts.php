<?php
require_once("../Controller/ProductsController.php");

$clients = new ProductsController();

if (isset($_REQUEST['name']) and !empty($_REQUEST['name'])) {

    $aws = $clients->searchProductsByName($_POST['name']);
} else {

    $aws = $clients->getAllProducts();
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
        <label for="name">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="name" placeholder="Buscar por Nome" id="name">

        <input type="submit" name="send" value="Confirmar">
    </form>

    <table style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome do Produto</th>
                <th>Preço do Produto</th>
                <th>Quantidade em estoque</th>
                <th>Desconto</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($aws as $value) {
                echo "
                    <tr>
                        <td>" . $value['id'] . "</td>
                        <td>" . $value['name'] . "</td>
                        <td>" . $value['price_product'] . "</td>
                        <td>" . $value['quantity_inventory'] . "</td>
                        <td>" . $value['discount'] . "</td>
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