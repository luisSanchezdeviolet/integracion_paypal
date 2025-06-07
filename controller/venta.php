<?php

//TODO; se incluyen los archivos necesarios
require_once '../config/connection.php';
require_once '../models/Venta.php';

//TODO; Se crea una instancia de la clase Producto

$venta = new Venta();

switch($_GET['opciones']) {
    case "mostrar":
        //TODO; Se obtiene la informacion del producto con el id enviado
        $datos = $venta->getVentaById($_POST['vent_id']);
        if(is_array($datos)==true and count($datos)>0) {
            foreach($datos as $row) {
                $output["vent_id"] = $row["vent_id"];
                $output["vent_nom"] = $row["vent_nom"];
                $output["vent_ape"] = $row["vent_ape"];
                $output["vent_email"] = $row["vent_email"];
                $output["vent_pais"] = $row["vent_pais"];
                $output["vent_dire"] = $row["vent_dire"];
                $output["vent_depa"] = $row["vent_depa"];
                $output["vent_codpostal"] = $row["vent_codpostal"];
                $output["vent_total"] = $row["vent_total"];

            }
        }

        echo json_encode($output);

        break;

    case "listar":
        $datos = $venta->getDetalleById($_POST['vent_id']);
        foreach($datos as $row) {
            ?>
            <tr>
                <td><?php echo $row['prod_nom']; ?></td>
                <td><?php echo "MXN".' '. $row['prod_precio']; ?></td>
                <td><?php echo $row['det_cant']; ?></td>
                <td><?php echo "MXN".' '. $row['det_total']; ?></td>
            <?php
        }
        break;

    case "update": 
        $datos = $venta->update_venta($_POST['vent_id'],$_POST['paymentId'],$_POST['token'],$_POST['PayerID'],$_POST['json_data']);
        break;
}