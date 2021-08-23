<?php
require_once("../Controller/OrdersController.php");

$aux = 0;
$buy = new OrdersController();
if (isset($_REQUEST['param']) and $_REQUEST['param'] != "") {
    $aws = $buy->showSingleOrder($_POST['param']);
    if ($aws) {
        $aux = count($aws);
    } else {
        echo "<h2>Compra não existe!</h2>";
    }
} else {
    $aws = $buy->showAllOrders();
    if ($aws) {
        //
    } else {
        echo "<h2>Nâo existem ordens cadastrados!</h2>";
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
        <label for="param">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="param" placeholder="Buscar" id="param">

        <input type="submit" name="send" value="Confirmar">
    </form>

    <table style="width:100%">
        <tr>
            <td>ID</td>
            <td>Tipo de Ordem</td>
            <td>Previsão de Entrega</td>
            <td>Data do Recebimento</td>
            <td>Nome do Cliente</td>
            <td>Situação</td>
            <td>Valor da Compra</td>

        </tr>
        <tr>
            <td><?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['oid'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['oid'] . "<br>";
                        }
                    }
                } ?></td>

            <td><?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['type'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['type'] . "<br>";
                        }
                    }
                } ?></td>

            <td><?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['forecast'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['forecast'] . "<br>";
                        }
                    }
                } ?></td>

            <td><?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['receipt'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['receipt'] . "<br>";
                        }
                    }
                } ?></td>

            <td><?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['name'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['name'] . "<br>";
                        }
                    }
                } ?></td>

            <td><?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['state'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['state'] . "<br>";
                        }
                    }
                } ?></td>

            <td><?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['final_price'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['final_price'] . "<br>";
                        }
                    }
                } ?></td>

        </tr>
    </table>
    <h2></h2>
    <i class="fas fa-reply"></i>
    <a href="./Buy.php"><button type="button">Voltar</button></a>
</body>

</html>