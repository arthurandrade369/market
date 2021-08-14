<html>

<body>
    <pre>
    <?php
    require_once("../Controller/ClientsController.php");

    $client = new ClientsController();

    print_r($client->showClient());
    ?>
    </pre>
</body>

</html>