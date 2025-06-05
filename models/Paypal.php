<?php

    use PayPal\Api\Amount;
    use PayPal\Api\Details;
    use PayPal\Api\Item;
    use PayPal\Api\ItemList;
    use PayPal\Api\Payer;
    use PayPal\Api\Payment;
    use PayPal\Api\RedirectUrls;
    use PayPal\Api\Transaction;

    use PayPal\Api\PaymentExecution;

    class Paypal extends Conectar{

        public function get_paypal($arrayDetalle,$vent_total,$vent_id){

            require '../include/bootstrap.php';

            error_reporting(0);

            #Seleccionamos el método de pago
            $payer = new Payer();
            $payer->setPaymentMethod("paypal");

            $detalles = array();
            $detalles = json_decode($arrayDetalle,true);

            $items = array();
            foreach ($detalles as $row) {
                $item = new Item();
                $item->setName($row['prod_nom'])
                    ->setCurrency('MXN')
                    ->setQuantity($row['det_cant'])
                    ->setPrice($row['prod_precio']);
                $items[] = $item;
            }

            $itemList = new ItemList();
            $itemList->setItems($items);

            #Agregamos los detalles del pago: impuestos, envíos...etc
            $details = new Details();
            $details->setShipping(0)
                    ->setTax(0)
                    ->setSubtotal($vent_total);

            #definimos el pago total con sus detalles
            $amount = new Amount();
            $amount->setCurrency("MXN")
                    ->setTotal($vent_total)
                    ->setDetails($details);

            #Agregamos las características de la transacción
            $transaction = new Transaction();
            $transaction->setAmount($amount)
                        ->setItemList($itemList)
                        ->setDescription("Payment description")
                        ->setInvoiceNumber(uniqid());

            #Agregamos las URL'S después de realizar el pago, o cuando el pago es cancelado
            #Importante agregar la URL principal en la API developers de Paypal
            $redirectUrls = new RedirectUrls();
            $redirectUrls->setReturnUrl("http://localhost/aprendizaje/integrar_paypal/view/invoice/?vent_id=".$vent_id)
                        ->setCancelUrl("http://localhost/aprendizaje/integrar_paypal/view/cart");

            #Agregamos todas las características del pago
            $payment = new Payment();
            $payment->setIntent("sale")
                    ->setPayer($payer)
                    ->setRedirectUrls($redirectUrls)
                    ->setTransactions(array($transaction));

            #Tratar de ejcutar un proceso y si falla ejecutar una rutina de error
            try {
                // traemos las credenciales $apiContext
                $payment->create($apiContext);
            }catch(PayPal\Exception\PayPalConnectionException $ex){
                echo $ex->getCode(); // Prints the Error Code
                echo $ex->getData(); // Prints the detailed error message
                die($ex);
                return "error";
            }

            # utilizamos un foreach para iterar sobre $payment, utilizamos el método llamado getLinks() para obtener todos los enlaces que aparecen en el array $payment y caso de que $Link->getRel() coincida con 'approval_url' extraemos dicho enlace, finalmente enviamos al usuario a esa dirección que guardamos en la variable $redirectUrl on el método getHref();
            foreach ($payment->getLinks() as $link) {
                if($link->getRel() == "approval_url"){
                    $redirectUrl = $link->getHref();
                }
            }

		    return $redirectUrl;
        }

    }
?>