<?php

require_once("../Entity/Sale.php");
require_once('../Entity/SaleItems.php');
require_once("../Controller/SaleController.php");
require_once("../Controller/ProductsController.php");
require_once("../Controller/SaleItemController.php");

$sale = new Sale();
$saleItems = new SaleItems();
$signupSale = new SaleController();
$signupSaleItems = new SaleItemController();
$products = new ProductsController();


if (isset($_REQUEST['send'])) {

    //Receiving the product from database
    $productQuerySingle = $products->searchProductsById($_POST['product_id']);

    //Verifying if quantity desire have on inventory
    if ($_POST['quantity_sale'] <= $productQuerySingle['quantity_inventory']) {

        //Posting datas in Sale
        $_POST['final_price'] = strval(($productQuerySingle['price_product'] * $_POST['quantity_sale']) + $_POST['shipping'] - floatval($_POST['discount']));

        $sale->setObject($_POST);
        $saleQuery = $signupSale->newSale($sale);

        //Posting datas in SaleItem
        $_POST['price_total'] = $productQuerySingle['price_product'] - $productQuerySingle['discount'];
        $_POST['sale_id'] = $saleQuery;
        $saleItems->setObject($_POST);
        $signupSaleItems->newSaleItem($saleItems);

        echo "<h2>Compra registrada com sucesso</h2>";

        //Forwarding to create a order
        if ($_POST['was_paid']) header("Location: ./NewOrder.php?sale_id=" . $saleQuery);
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


            <label for="product_id">
                <strong>Produto</strong>
            </label>
            <select name="product_id" id="product_id">
                <?php
                $productsQueryAll = $products->getAllProducts();

                if ($productsQueryAll) {
                    foreach ($productsQueryAll as $values) {
                        echo "<option value='{$values['id']}'>{$values['name']}</option>";
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
                <strong>Situa????o</strong>
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
                <option value="0">N??o</option>
                <option value="1">Sim</option>
            </select>

            <label for="payment_method">
                <strong>M??todo de pagamento</strong>
            </label>
            <select name="payment_method" id="payment_method">
                <option value="Boleto Banc??rio">Boleto Banc??rio</option>
                <option value="Cartao de Cr??dito">Cart??o de Cr??dito</option>
                <option value="Cart??o de D??bito">Cart??o de D??bito</option>
                <option value="Transfer??ncia B??ncaria">Transfer??ncia B??ncaria</option>
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
        <a href="./Sale.php"><button type="button">Voltar</button></a>
    </div>

</body>

</html>