<?php

require_once(__DIR__ . "/../../src/Entity/Clients.php");
require_once(__DIR__ . "/../../src/Entity/ClientAddresses.php");
require_once(__DIR__ . "/../../src/Controller/ClientsController.php");

if (isset($_REQUEST['send'])) {

    $signup = new ClientsController();
    $user = new Clients();
    $address = new ClientAddresses();

    if ($signup->checkIsEmail($_POST['email'])) {

        $user->setObject($_POST);
        $_POST['clientId'] = $signup->newClient($user);

        $address->setObject($_POST);
        $signup->newClientAddress($address);

        echo "<h2>Cliente cadastrado com sucesso!</h2>";
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

            <h2>Endereço: </h2>

            <label for="postal_code">
                <i class="fas fa-home"></i>
            </label>
            <input type="text" name="postal_code" placeholder="CEP" id="postal_code" required>

            <label for="street">
                <i class="fas fa-home"></i>
            </label>
            <input type="text" name="street" placeholder="Rua" id="street" required>

            <label for="number">
                <i class="fas fa-home"></i>
            </label>
            <input type="text" name="number" placeholder="N°" id="" required>

            <label for="district">
                <i class="fas fa-home"></i>
            </label>
            <input type="text" name="district" placeholder="Bairro" id="district" required>

            <h1></h1>

            <label for="city">
                <i class="fas fa-home"></i>
            </label>
            <input type="text" name="city" placeholder="Cidade" id="city" required>

            <label for="state">
                <i class="fas fa-home"></i>
            </label>
            <input type="text" name="state" placeholder="Estado" id="state" required>


            <label for="complement">
                <i class="fas fa-home"></i>
            </label>
            <input type="text" name="complement" placeholder="Complemento" id="complement">

            <h1></h1>
            <input type="submit" name="send" value="Cadastrar">
        </form>
        <i class="fas fa-reply"></i>
        <a href="./Clients.php"><button type="button">Voltar</button></a>
    </div>

</body>

</html>