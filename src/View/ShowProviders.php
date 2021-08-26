<?php
require_once("../Controller/ProvidersController.php");

$aux = 0;
$clients = new ProvidersController();

if (isset($_REQUEST['name']) and !empty($_REQUEST['name'])) {

    $aws = $clients->searchProvidersByName($_POST['name']);
    if ($aws) {
        $aux = count($aws);
    } else {
        echo "<h2>Fornecedor não existe!</h2>";
    }
} else {

    $aws = $clients->getAllProviders();
    if ($aws) {
        //
    } else {
        echo "<h2>Nâo existem fornecedores cadastrados!</h2>";
    }
}
?>

<html>

<head>
    <meta charset="utf-8">
    <title>Fornecedores</title>
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
        <input type="text" name="param" placeholder="Buscar" id="param">

        <input type="submit" name="send" value="Confirmar">
    </form>

    <table style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome da Empresa</th>
                <th>Razão Social</th>
                <th>CNPJ</th>
                <th>Rua</th>
                <th>Número</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Complemento</th>
                <th>Codigo postal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['id'];
                    } else {
                        foreach ($aws as $value) {
                            echo "
                            <tr>
                                <td>" . $value['id'] . "</td>
                                <td>" . $value['name'] . "</td>
                                <td>" . $value['social_reason'] . "</td>
                                <td>" . $value['cnpj'] . "</td>
                                <td>" . $value['street'] . "</td>
                                <td>" . $value['number'] . "</td>
                                <td>" . $value['district'] . "</td>
                                <td>" . $value['city'] . "</td>
                                <td>" . $value['state'] . "</td>
                                <td>" . $value['complement'] . "</td>
                                <td>" . $value['postal_code'] . "</td>
                            </tr>";
                        }
                    }
                }
                ?>
        </tbody>
    </table>
    <h2></h2>
    <i class="fas fa-reply"></i>
    <a href="./Providers.php"><button type="button">Voltar</button></a>
</body>

</html>