<?php

require_once("../Entity/Buy.php");
require_once('../Entity/SaleItems.php');
require_once("../Controller/BuyController.php");
require_once("../Controller/ProductsController.php");
require_once("../Controller/SaleController.php");

$buy = new Buy();
$sale = new Sale_items();
$signupBuy = new BuyController();
$signupSale = new SaleController();
$products = new ProductsController();


if (isset($_REQUEST['send'])) {

    //Receiving the product from database
    $productQuery = $products->showSingleProducts($_POST['product']);

    //Verifying if quantity desire have on inventory
    if ($_POST['quantity_sale'] <= $productQuery['quantity_inventory']) {

        //Posting datas
        $_POST['product_id'] = $productQuery['id'];
        $_POST['final_price'] = strval(($productQuery['price_product'] * $_POST['quantity_sale']) + $_POST['shipping'] - $_POST['discount']);

        $buy->setObject($_POST);
        $signupBuy->newBuy($buy);

        $buyQuery = $signupBuy->getLastColumn();

        //Posting datas
        $_POST['price_total'] = $productQuery['price_product'] - $productQuery['discount'];
        $_POST['buy_id'] = $buyQuery['id'];
        $_POST['product_id'] = $productQuery['id'];
        $sale->setObject($_POST);
        $signupSale->newSale($sale);

        echo "<h2>Compra registrada com sucesso</h2>";

        //Forwarding to create a order
        if ($_POST['was_paid']) header("Location: ./NewOrder.php");
    } else {
        echo "<h2>Quantidade desejada superior ao que temos em estoque!</h2>";
    }
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
        <h1>Compras</h1>
        <h2>Dados da Compra:</h2>

        <form method="post" id="productForm">


            <label for="product">
                <strong>Produto</strong>
            </label>
            <select name="product" id="product">
                <?php
                $sql = "
                    SELECT
                        *
                    FROM
                        products
                    ";
                $pSql = Connection::getInstance()->prepare($sql);
                $pSql->execute();
                if ($pSql->rowCount() > 0) {
                    while ($product = $pSql->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$product['id']}'>{$product['name']}</option>";
                    }
                }
                ?>
            </select>

            <label for="quantity_sale">
                <strong>Quantidade</strong>
            </label>
            <input type="number" name="quantity_sale" placeholder="Quantidade do produto" id="quantity_sale">

            <h2></h2>

            <label for="state">
                <strong>Situação</strong>
            </label>
            <select name="state" id="state">
                <option value="Cancelado">Cancelado</option>
                <option value="Pendente">Pendente</option>
                <option value="Concluido">Concluido</option>
            </select>

            <label for="was_paid">
                <strong>Pagamento efetuado</strong>
            </label>
            <select name="was_paid" id="was_paid">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>

            <label for="payment_method">
                <strong>Método de pagamento</strong>
            </label>
            <select name="payment_method" id="payment_method">
                <option value="Boleto Bancário">Boleto Bancário</option>
                <option value="Cartao de Crédito">Cartão de Crédito</option>
                <option value="Cartão de Débito">Cartão de Débito</option>
                <option value="Transferência Báncaria">Transferência Báncaria</option>
                <option value="Pix">Pix</option>
            </select>

            <label for="discount">
                <strong>Desconto</strong> R$
            </label>
            <input type="number" step="0.01" name="discount" placeholder="Desconto total" id="discount">

            <label for="shipping">
                <strong>Frete</strong> R$
            </label>
            <input type="number" step="0.01" name="shipping" placeholder="Valor do frete" id="discount" required>


            <h2></h2>

            <input type="submit" name="send" value="Cadastrar">
        </form>

        <i class="fas fa-reply"></i>
        <a href="./Buy.php"><button type="button">Voltar</button></a>
    </div>

</body>

</html>