<?php
    use TECWEB\MYAPI\Read\ProductSearch;
    require_once __DIR__ . '/../vendor/autoload.php';

    $productos = new ProductSearch('marketzone');
    $productos->search( $_GET['search'] );
    echo $productos->getData();
?>