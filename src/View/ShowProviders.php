<?php
require_once("../Controller/ProvidersController.php");

$aux = 0;
$clients = new ProvidersController();

if (isset($_REQUEST['param']) and $_REQUEST['param'] != "") {

    $aws = $clients->showSingleProviders($_POST['param']);
    if ($aws) {
        $aux = count($aws);
    } else {
        echo "<h2>Fornecedor não existe!</h2>";
    }

} else {

    $aws = $clients->showAllProviders();
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
        <label for="param">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="param" placeholder="Buscar" id="param">

        <input type="submit" name="send" value="Confirmar">
    </form>

    <table style="width:105%">
        <tr>
            <td>Id</td>
            <td>Nome da Empresa</td>
            <td>Razão Social</td>
            <td>CNPJ</td>
            <td>Rua</td>
            <td>Número</td>
            <td>Bairro</td>
            <td>Cidade</td>
            <td>Estado</td>
            <td>Complemento</td>
            <td>Codigo postal</td>
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
                        echo $aws['social_reason'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['social_reason'] . "<br>";
                        }
                    }
                } ?></td>

            <td><?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['cnpj'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['cnpj'] . "<br>";
                        }
                    }
                } ?></td>

            <td><?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['street'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['street'] . "<br>";
                        }
                    }
                } ?></td>

            <td><?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['number'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['number'] . "<br>";
                        }
                    }
                } ?></td>

            <td><?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['district'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['district'] . "<br>";
                        }
                    }
                } ?></td>

            <td><?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['city'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['city'] . "<br>";
                        }
                    }
                } ?></td>

            <td><?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['state'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['state'] . "<br>";
                        }
                    }
                } ?></td>

            <td><?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['complement'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['complement'] . "<br>";
                        }
                    }
                } ?></td>

            <td><?php if ($aws) {
                    if (count($aws) == $aux) {
                        echo $aws['postal_code'];
                    } else {
                        foreach ($aws as $value) {
                            echo $value['postal_code'] . "<br>";
                        }
                    }
                } ?></td>


        </tr>
    </table>
    <h2></h2>
    <i class="fas fa-reply"></i>
    <a href="./Providers.php"><button type="button">Voltar</button></a>
</body>

</html>