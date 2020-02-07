<?php

include 'Connectdb.php';

//comprobamos la conexion
if ($database->status == 1) {

    // Realizamos la consulta a la table products.
    $products = $database->connect_mysql->query("SELECT * FROM products");

    // Recorremos los productos y los almacenamos en data
    $data = [];
    while ($re = $products->fetch_assoc()) {
        $data[] = $re;
    }

    // Nos obliga a retornar un JSON y agrega a la cabecera el Header Content Type
    header('Content-Type: application/json');
    echo json_encode($data);

    // Cerramos la base datos
    $database->closeMsql();
} else {
    echo $database->message;
}
