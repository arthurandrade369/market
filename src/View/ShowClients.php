<?php
require_once("../Controller/ClientsController.php");

$clients = new ClientsController();

if (isset($_REQUEST['name']) and !empty($_REQUEST['name'])) {

    $aws = $clients->searchClientByName($_POST['name']);
    if ($aws) {
        //
    } else {
        echo "<h2>Cliente não existe!</h2>";
    }
} else {

    $aws = $clients->getAllClients();
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
        <label for="name">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="name" placeholder="Buscar Nome" id="name">

        <input type="submit" name="send" value="Confirmar">
    </form>
    <table style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Rua</th>
                <th>Número</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Complemento</th>
                <th>Código Postal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($aws) {
                foreach ($aws as $value) {
                    echo "
                        <tr><td>" . $value['id'] . "</td>
                        <td>" . $value['name'] . "</td>
                        <td>" . $value['email'] . "</td>
                        <td>" . $value['street'] . "</td>
                        <td>" . $value['number'] . "</td>
                        <td>" . $value['district'] . "</td>
                        <td>" . $value['city'] . "</td>
                        <td>" . $value['state'] . "</td>
                        <td>" . $value['complement'] . "</td>
                        <td>" . $value['postal_code'] . "</td></tr>";
                }
            }
            ?>
        </tbody>
    </table>
    <h2></h2>
    <i class="fas fa-reply"></i>
    <a href="./Clients.php"><button type="button">Voltar</button></a>
</body>

</html>