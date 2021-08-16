<?php
require_once("../Controller/ClientsController.php");


$client = new ClientsController();
$aws = $client->showAllClients();
if ($aws) {
    var_dump($aws);
} else {
    echo "<h2>Nâo existem clientes cadastrados!</h2>";
}
?>

<html>

<head>
    <meta charset="utf-8">
    <title>Clientes</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>
    <table>
        <tr>
            <td>Id:</td>
            <td><?= $aws['id'] ?></td>
        </tr>
        <tr>
            <td>Nome:</td>
            <td><?= $aws['name'] ?></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><?= 'email' ?></td>
        </tr>
    </table>

    <i class="fas fa-undo"></i>
    <a href="./Clients.php"><button type="button">Voltar</button></a>
</body>

</html>