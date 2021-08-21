<?php
require_once("../Controller/BuyController.php");

$aux = 0;
$buy = new BuyController();
if (isset($_REQUEST['param']) and $_REQUEST['param'] != "") {
    $aws = $buy->showSingleBuy($_POST['param']);
    if ($aws) {
        $aux = count($aws);
    } else {
        echo "<h2>Compra não existe!</h2>";
    }
} else {
    $aws = $buy->showAllBuies();
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
            <td>Id</td>
            
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

            
        </tr>
    </table>
    <h2></h2>
    <i class="fas fa-reply"></i>
    <a href="./Buy.php"><button type="button">Voltar</button></a>
</body>

</html>