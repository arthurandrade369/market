<?php
require_once("../Controller/BatchesController.php");

$aux = 0;
$batches = new BatchesController();
if (isset($_REQUEST['param']) and $_REQUEST['param'] != "") {
    $aws = $batches->showSingleBatch($_POST['param']);
    if ($aws) {
        $aux = count($aws);
    } else {
        echo "<h2>Lote não existe!</h2>";
    }
} else {
    $aws = $batches->showAllBatches();
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
        <label for="param">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="param" placeholder="Buscar" id="param">

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
            <td>Quantidade restante</td>
            <td>Em Uso</td>
            <td>Esgotado</td>
            <td>Descrição do Lote</td>

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
                        echo $aws['products_id'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['products_id'] . "<br>";
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
                        echo $aws['fabrication_date'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['fabrication_date'] . "<br>";
                        }
                    }
                } ?></td>

            <td><?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['expiration_date'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['expiration_date'] . "<br>";
                        }
                    }
                } ?></td>

            <td><?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['entry_date'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['entry_date'] . "<br>";
                        }
                    }
                } ?></td>

            <td><?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['quantity'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['quantity'] . "<br>";
                        }
                    }
                } ?></td>

            <td><?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['used'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['sold_off'] . "<br>";
                        }
                    }
                } ?></td>

            <td><?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['description'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['description'] . "<br>";
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