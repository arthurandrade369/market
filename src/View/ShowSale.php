<?php
require_once("../Controller/SaleController.php");

$aux = 0;
$sale = new SaleController();

if (isset($_REQUEST['id']) and !empty($_REQUEST['id'])) {

    $aws = $sale->searchSaleById($_POST['id']);
    if ($aws) {
        $aux = count($aws);
    } else {
        echo "<h2>Compra não existe!</h2>";
    }
} else {

    $aws = $sale->getAllSales();
    if ($aws) {
        //
    } else {
        echo "<h2>Nâo existem compras cadastrados!</h2>";
    }
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
        <label for="id">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="id" placeholder="Buscar por ID" id="id">

        <input type="submit" name="send" value="Confirmar">
    </form>

    <table style="width:100%">
        <thead>
            <tr>
                <td>Data</td>
                <td>Id da Compra</td>
                <td>Produto</td>
                <td>Situação</td>
                <td>Foi Pago</td>
                <td>Metodo de Pagamento</td>
                <td>Valor da Compra</td>
                <td>Quantidade Vendida</td>

            </tr>
        </thead>
        <tbody>
            <?php if ($aws) {
                if (count($aws) == $aux) {
                    echo $aws['date'];
                } else {
                    foreach ($aws as $value) {
                        $wasPaid = $value['was_paid'] == 1? "Sim" : "Não";

                        echo "
                            <tr>
                                <td>" . $value['date'] . "</td>
                                <td>" . $value['id'] . "</td>
                                <td>" . $value['name'] . "</td>
                                <td>" . $value['state'] . "</td>
                                <td>" . $wasPaid . "</td>
                                <td>" . $value['payment_method'] . "</td>
                                <td>" . $value['final_price'] . "</td>
                                <td>" . $value['quantity_sale'] . "</td>
                            </tr>";
                    }
                }
            } ?>
        </tbody>
    </table>
    <h2></h2>
    <i class="fas fa-reply"></i>
    <a href="./Sale.php"><button type="button">Voltar</button></a>
</body>

</html>