<?php

require_once '../config/connection.php';
require_once '../models/Paypal.php';
require_once '../models/Venta.php';

require_once '../include/bootstrap.php';

$venta = new Venta();
$paypal = new Paypal();


switch($_GET['opciones']) {

    

    case "pagar":
        $vent_total = $_POST['vent_total'];
        $datos_venta = $venta->insert_venta(
            $_POST['vent_nom'],
            $_POST['vent_ape'],
            $_POST['vent_telf'],
            $_POST['vent_email'],
            $_POST['vent_pais'],
            $_POST['vent_dire'],
            $_POST['vent_depa'],
            $_POST['vent_codpostal'],
            $vent_total
        );
        if (is_array($datos_venta)) {
            $vent_id = $datos_venta[0]['id_venta'];


            



            $detalles = array();
            $detalles = json_decode($_POST['detalles']);

            foreach($detalles as $row) {
                $det_cant = $row->det_cant;
                $prod_id = $row->prod_id;
                $cat_id = $row->cat_id;
                $prod_nom = $row->prod_nom;
                $prod_precio = $row->prod_precio;
                $det_total = $row->det_total;
                $venta->insertDetalleVenta($vent_id, $det_cant, $prod_id, $cat_id, $prod_nom, $prod_precio, $det_total);
            }
        }else {
            $datos = "Error al insertar la venta";
        }

        $datos = $paypal->get_paypal($_POST['detalles'],$vent_total,$vent_id);

        
       echo $datos;
       break;

    case "validar": 
        $datos = $paypal->getValidarPaypal($_POST['paymentId'], $_POST['PayerID']);
        echo $datos;


        break;
}