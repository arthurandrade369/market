<?php
require_once("../Controller/ClientsController.php");


$clients = new ClientsController();
if (isset($_REQUEST['id']) and $_REQUEST['id'] != "") {
    $aws = $clients->showSingleClients($_POST['id']);
    if ($aws) {
        //
    } else {
        echo "<h2>Id não existe!</h2>";
    }
} else {
    $aws = $clients->showAllClients();
    if ($aws) {
        //
    } else {
        echo "<h2>Nâo existem clientes cadastrados!</h2>";
    }
}
?>

<html>

<head>
    <meta charset="utf-8">
    <title>Clientes</title>
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
        <input type="text" name="id" placeholder="Id" id="id">

        <input type="submit" name="send" value="Confirmar">
    </form>
    <table style="width:80%">
        <tr>
            <td>Id</td>
            <td>Nome</td>
            <td>Email</td>
            <td>Rua</td>
            <td>Número</td>
            <td>Bairro</td>
            <td>Cidade</td>
            <td>Estado</td>
            <td>Complemento</td>
        </tr>
        <tr>
            <td><?php if (count($aws) == 23) {
                    echo $aws['id'];
                } else {
                    foreach ($aws as $value) {
                        echo $value['id'] . "<br>";
                    }
                } ?></td>

            <td><?php if (count($aws) == 23) {
                    echo $aws['name'];
                } else {
                    foreach ($aws as $value) {
                        echo $value['name'] . "<br>";
                    }
                } ?></td>

            <td><?php if (count($aws) == 23) {
                    echo $aws['email'];
                } else {
                    foreach ($aws as $value) {
                        echo $value['email'] . "<br>";
                    }
                } ?></td>

            <td><?php if (count($aws) == 23) {
                    echo $aws['street'];
                } else {
                    foreach ($aws as $value) {
                        echo $value['street'] . "<br>";
                    }
                } ?></td>

            <td><?php if (count($aws) == 23) {
                    echo $aws['number'];
                } else {
                    foreach ($aws as $value) {
                        echo $value['number'] . "<br>";
                    }
                } ?></td>

            <td><?php if (count($aws) == 23) {
                    echo $aws['district'];
                } else {
                    foreach ($aws as $value) {
                        echo $value['district'] . "<br>";
                    }
                } ?></td>

            <td><?php if (count($aws) == 23) {
                    echo $aws['city'];
                } else {
                    foreach ($aws as $value) {
                        echo $value['city'] . "<br>";
                    }
                } ?></td>

            <td><?php if (count($aws) == 23) {
                    echo $aws['state'];
                } else {
                    foreach ($aws as $value) {
                        echo $value['state'] . "<br>";
                    }
                } ?></td>

            <td><?php if (count($aws) == 23) {
                    echo $aws['complement'];
                } else {
                    foreach ($aws as $value) {
                        echo $value['complement'] . "<br>";
                    }
                } ?></td>

        </tr>
    </table>
    <h2></h2>
    <i class="fas fa-undo"></i>
    <a href="./Clients.php"><button type="button">Voltar</button></a>
</body>

</html>