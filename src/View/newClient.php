<?php

require_once(__DIR__ . "/../../src/Entity/clients.php");
require_once(__DIR__ . "/../../src/Entity/client_adresses.php");
require_once(__DIR__ . "/../../src/Controller/clientsController.php");

if (isset($_REQUEST['send'])) {
    $signup = new ClientsController();
    if ($signup->checkIsEmail($_POST['email'])) {
        $user = new Clients;
        $address = new Client_adresses;
        $user->setObject(array($_POST['name'], $_POST['email']));
        $address->setObject(array(
            $_POST['state'], $_POST['city'], $_POST['district'], $_POST['street'], $_POST['number'],
            $_POST['complement'], $_POST['postal_code']
        ));
        $signup->newClient($user);
        $signup->newClientAddress($address);
    } else {
        echo "<h2>Email ja existe!</h2>";
    }
}

?>

<html>

<head>
    <meta charset="utf-8">
    <title>Cliente</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>
    <div class="register">
        <h1>Cliente</h1>
        <h2>Pessoal:</h2>

        <form method="post">
            <label for="name">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="name" placeholder="Nome" id="name" required>

            <label for="email">
                <i class="fas fa-at"></i>
            </label>
            <input type="text" name="email" placeholder="Email" id="email" required>

            <h2>Endereço</h2>

            <label for="state">
                <i class="fas fa-home"></i>
            </label>
            <input type="text" name="state" placeholder="Estado" id="state" required>

            <label for="city">
                <i class="fas fa-home"></i>
            </label>
            <input type="text" name="city" placeholder="Cidade" id="city" required>

            <label for="district">
                <i class="fas fa-home"></i>
            </label>
            <input type="text" name="district" placeholder="Bairro" id="district" required>

            <label for="street">
                <i class="fas fa-home"></i>
            </label>
            <input type="text" name="street" placeholder="Rua" id="street" required>

            <h4></h4>

            <label for="number">
                <i class="fas fa-home"></i>
            </label>
            <input type="text" name="number" placeholder="N°" id="" required>

            <label for="complement">
                <i class="fas fa-home"></i>
            </label>
            <input type="text" name="complement" placeholder="Complemento" id="complement">

            <label for="postal_code">
                <i class="fas fa-home"></i>
            </label>
            <input type="text" name="postal_code" placeholder="CEP" id="postal_code" required>


            <h1></h1>
            <input type="submit" name="send" value="Cadastrar">
        </form>

        <a href="../../public/index.php"><button type="button">Voltar</button></a>
    </div>

</body>

</html>