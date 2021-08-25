<?php
require_once("../Controller/SaleController.php");

$aux = 0;
$sale = new SaleController();

if (isset($_REQUEST['param']) and $_REQUEST['param'] != "") {

    $aws = $sale->showSingleSales($_POST['param']);
    if ($aws) {
        $aux = count($aws);
    } else {
        echo "<h2>Compra não existe!</h2>";
    }

} else {

    $aws = $sale->showAllSales();
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
        <label for="param">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="param" placeholder="Buscar" id="param">

        <input type="submit" name="send" value="Confirmar">
    </form>

    <table style="width:100%">
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
        <tr>
            <td><?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['date'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['date'] . "<br>";
                        }
                    }
                } ?></td>

            <td><?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['sale_id'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['sale_id'] . "<br>";
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
                        if ($aws['was_paid']) echo "Sim";
                        else echo "Não";
                    } else {
                        foreach ($aws as $value) {
                            if ($value['was_paid']) echo "Sim <br>";
                            else echo "Não <br>";
                        }
                    }
                } ?></td>

            <td><?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['payment_method'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['payment_method'] . "<br>";
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

            <td><?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['quantity_sale'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['quantity_sale'] . "<br>";
                        }
                    }
                } ?></td>

        </tr>
    </table>
    <h2></h2>
    <i class="fas fa-reply"></i>
    <a href="./Sale.php"><button type="button">Voltar</button></a>
</body>

</html>