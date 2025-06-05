<?php

require_once '../config/connection.php';
require_once '../models/Paypal.php';


$paypal = new Paypal();
$arrayDetalle = $_POST['arrayDetalle'];
$vent_total = $_POST['vent_total'];
$vent_id = $_POST['vent_id'];

switch($_GET['opciones']) {
    case "pagar":
       $datos = $paypal->get_paypal($arrayDetalle,$vent_total,$vent_id);
       break;
}