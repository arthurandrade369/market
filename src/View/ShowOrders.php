<?php
require_once("../Controller/OrdersController.php");
$order = new OrdersController();

if (isset($_REQUEST['client']) and !empty($_REQUEST['client'])) {

    $aws = $order->searchOrderByClient($_POST['client']);
} else {

    $aws = $order->getAllOrders();
}
?>

<html>

<head>
    <meta charset="utf-8">
    <title>Compras</title>
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
        <label for="client">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="client" placeholder="Buscar Cliente" id="client">

        <input type="submit" name="send" value="Confirmar">
    </form>

    <table style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo de Ordem</th>
                <th>Previsão de Entrega</th>
                <th>Data do Recebimento</th>
                <th>Nome do Cliente</th>
                <th>Situação</th>
                <th>Valor da Compra</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($aws as $value) {
                echo "
                    <tr>
                        <td>" . $value['order_id'] . "</td>
                        <td>" . $value['type'] . "</td>
                        <td>" . $value['forecast'] . "</td>
                        <td>" . $value['receipt'] . "</td>
                        <td>" . $value['name'] . "</td>
                        <td>" . $value['state'] . "</td>
                        <td>" . $value['final_price'] . "</td>
                    </tr>";
            }

            ?>
        </tbody>
    </table>
    <h2></h2>
    <i class="fas fa-reply"></i>
    <a href="./Sale.php"><button type="button">Voltar</button></a>
</body>

</html>