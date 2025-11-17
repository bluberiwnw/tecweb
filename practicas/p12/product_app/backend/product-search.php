<?php
    use TECWEB\MYAPI\Read\ProductSearch;
    require_once __DIR__ . '/../vendor/autoload.php';

    $productos = new Products('marketzone');
    $productos->search( $_GET['search'] );
    echo $productos->getData();
?>