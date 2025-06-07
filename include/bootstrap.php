<?php
    require __DIR__  . '/vendor/autoload.php';

    use PayPal\Rest\ApiContext;
    use PayPal\Auth\OAuthTokenCredential;

   $clientId = 'AZNrLJJ5oH5L-Otvod-RFm1iedP3Oowzm6X3jtncua1Z5hZi_gHpUMz7fYNsFEUYJrLjFl95Ws_Y2aIV';
    $clientSecret = 'EMVcaAnUCYOUOr3k2bbHpeyEa5WWvNlxHqGpezhuE-8zlO_g6nCvsgYlVpCzauYqNFH3WPT-2unih-iD';

    $apiContext = new ApiContext(
        new OAuthTokenCredential(
            $clientId,
            $clientSecret
        )
    );

    $apiContext->setConfig(
        array(
            'mode' => 'sandbox',
            'log.LogEnabled' => true,
            'log.FileName' => 'PayPal.log',
            'log.LogLevel' => 'DEBUG',
            'http.CURLOPT_CONNECTTIMEOUT' => 30
        )
    );
?>
