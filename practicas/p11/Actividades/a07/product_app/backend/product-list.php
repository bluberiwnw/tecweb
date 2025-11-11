<?php
    use TECWEB\MYAPI\Products as Products;
    require_once __DIR__ . '\myapi\Products.php';

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    $prodObj = new Products('marketzone');
    $prodObj->list();

    echo $prodObj->getData();
?>