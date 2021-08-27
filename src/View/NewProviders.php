<?php

require_once("../Entity/Providers.php");
require_once("../Entity/ProvidersAddresses.php");
require_once("../Controller/ProvidersController.php");

$signup = new ProvidersController();
$providers = new Providers();
$address = new ProvidersAddresses();

if (isset($_REQUEST['send'])) {
    $isProvider = $signup->checkIsCnpj($_POST['cnpj']);
    if (!$isProvider) {

        $providers->setObject($_POST);
        $providerId = $signup->newProviders($providers);

        $_POST['provider_id'] = $providerId;
        $address->setObject($_POST);
        $signup->newProvidersAddress($address);

        echo "<h2>Fornecedor cadastrado com sucesso!</h2>";
    } else {
        echo "<h2>CNPJ ja existe!</h2>";
    }
}

?>

<html>

<head>
    <meta charset="utf-8">
    <title>Fornecedores</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>
    <div class="register">
        <h1>Fornecedores</h1>
        <h2>Dados:</h2>

        <form method="post">
            <label for="name">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="name" placeholder="Nome" id="name" required>

            <label for="socialreason">
                <i class="fas fa-marker"></i>
            </label>
            <input type="text" name="socialreason" placeholder="Razão Social" id="socialreason" required>

            <label for="cnpj">
                <i class="fas fa-hashtag"></i>
            </label>
            <input type="text" name="cnpj" placeholder="CNPJ" id="cnpj" required>

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
        <a href="./Providers.php"><button type="button">Voltar</button></a>
    </div>

</body>

</html>