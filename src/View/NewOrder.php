<?php

require_once("../Entity/Orders.php");
require_once("../Controller/OrdersController.php");
require_once("../Controller/ClientsController.php");
require_once("../Controller/BuyController.php");

if (isset($_REQUEST['send'])) {
    $order = new Orders;
    $orderQuery = new OrdersController;
    $client = new ClientsController;
    $buy = new BuyController;

    $_POST['buy_id'] = $buy->getLastColumn()['id'];

    $order->setObject($_POST);
    $orderQuery->newOrder($order);

    echo "<h2>Cadastrado com sucesso</h2>";
}

?>

<html>

<head>
    <meta charset="utf-8">
    <title>Compras</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>
    <div class="register">
        <h1>Ordem</h1>

        <form method="post">

            <label for="clients_id">
                <strong>Cliente: </strong>
            </label>
            <select name="clients_id" id="clients_id">
                <?php
                $sql = "
                    SELECT
                        *
                    FROM
                        clients
                    ";
                $pSql = Connection::getInstance()->prepare($sql);
                $pSql->execute();
                if ($pSql->rowCount() > 0) {
                    while ($client = $pSql->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$client['id']}'>{$client['name']}</option>";
                    }
                }
                ?>
            </select>

            <label for="type">
                <strong>Tipo de ordem</strong>
            </label>
            <input type="text" name="type" placeholder="Tipo" id="type" required>

            <label for="receipt">
                <strong>Data de Recebimento</strong>
            </label>
            <input type="date" name="receipt" id="receipt" required>

            <label for="forecast">
                <strong>Previsão de Entrega</strong>
            </label>
            <input type="date" name="forecast" id="forecast" required>

            <h1></h1>
            <input type="submit" name="send" value="Cadastrar">
        </form>
        <i class="fas fa-reply"></i>
        <a href="./Buy.php"><button type="button">Voltar</button></a>
    </div>

</body>

</html>