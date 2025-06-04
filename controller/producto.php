<?php

//TODO; se incluyen los archivos necesarios
require_once '../config/connection.php';
require_once '../models/Product.php';

//TODO; Se crea una instancia de la clase Producto

$producto = new Producto();

switch($_GET['opciones']) {
    case "listar":
        //TODO; Se obtienen todos los productos y se preparan los datos para enviar como respuesta
        $datos = $producto->getProduct();
        $data = array();

        foreach($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row['cat_nom'];
            $sub_array[] = $row['prod_nom'];
            $sub_array[] = $row['prod_moneda'];
            $sub_array[] = $row['prod_precio'];
            $sub_array[] = '<button type="button" onClick="agregar('.$row["prod_id"].')" id="'.$row["prod_id"].'" class="btb btn-solid btn-xs">Agregar</button> ';
            $data[] = $sub_array;
        }

        //TODO; Se prepara la respuesta en formato JSON
        $result = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);
            echo json_encode($result);
            break;
    case "mostrar":
        //TODO; Se obtiene la informacion del producto con el id enviado
        $datos = $producto->getProductById($_POST['prod_id']);
        if(is_array($datos)==true and count($datos)>0) {
            foreach($datos as $row) {
                $output["prod_id"] = $row["prod_id"];
                $output["cat_id"] = $row["cat_id"];
                $output["cat_nom"] = $row["cat_nom"];
                $output["prod_nom"] = $row["prod_nom"];
                $output["prod_moneda"] = $row["prod_moneda"];
                $output["prod_precio"] = $row["prod_precio"];
            }
        }

        echo json_encode($output);

        break;
}