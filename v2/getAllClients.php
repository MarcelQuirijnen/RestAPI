<?php

require_once 'curl_helper.php';
$restAPIBaseURL = 'http://localhost';

try {
    // Get all clients
    $resp = sendRequest('GET', $restAPIBaseURL.'/api.php/clients');
    $result = json_decode($resp, true);
    // Process the response
    var_dump($result);
} catch (Exception $e) {
    echo 'Caught exception getting list of clients: ',  $e->getMessage(), "\n";
}

?>