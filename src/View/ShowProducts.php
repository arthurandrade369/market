<?php
require_once("../Controller/ProductsController.php");

$aux = 0;
$clients = new ProductsController();
if (isset($_REQUEST['param']) and $_REQUEST['param'] != "") {
    $aws = $clients->showSingleProducts($_POST['param']);
    if ($aws) {
        $aux = count($aws);
    } else {
        echo "<h2>Produto não existe!</h2>";
    }
} else {
    $aws = $clients->showAllProducts();
    if ($aws) {
        //
    } else {
        echo "<h2>Nâo existem produtos cadastrados!</h2>";
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
        <label for="param">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="param" placeholder="Buscar" id="param">

        <input type="submit" name="send" value="Confirmar">
    </form>

    <table style="width:100%">
        <tr>
            <td>Id</td>
            <td>Nome do Produto</td>
            <td>Preço do Produto</td>
            <td>Quantidade em estoque</td>
            <td>Desconto</td>
            
        </tr>
        <tr>
            <td><?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['id'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['id'] . "<br>";
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
                        echo "R$" . $aws['price_product'];
                    } else {
                        foreach ($aws as $value) {
                            echo "R$ " . $value['price_product'] . "<br>";
                        }
                    }
                } ?></td>

            <td><?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['quantity_inventory'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['quantity_inventory'] . "<br>";
                        }
                    }
                } ?></td>

            <td><?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['discount'];
                        echo "<td>Atualizar</td>";
                    } else {
                        foreach ($aws as $value) {
                            echo $value['discount'] . "<br>";
                        }
                    }
                } ?></td>

        </tr>
    </table>
    <h2></h2>
    <i class="fas fa-reply"></i>
    <a href="./Products.php"><button type="button">Voltar</button></a>
</body>

</html>