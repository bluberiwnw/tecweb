<?php
    use TECWEB\MYAPI\Products as Products;
    require_once __DIR__ . '\myapi\Products.php';

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //SE VERIFICA QUE EL PARÁMETRO NAME HAYA SIDO ENVIADO
    if (isset($_GET['name'])) {
        $name = $_GET['name'];
    } elseif (isset($_POST['id'])) {
        $name = $_POST['id'];
    } else {
        echo json_encode(['error' => 'Debe proporcionar el parámetro NAME o ID']);
        exit;
    }

    $prodObj = new Products('marketzone');
    $prodObj->singleByName($name);

    echo $prodObj->getData();
?>
