<?php

require_once 'curl_helper.php';
$restAPIBaseURL = 'http://localhost';

try {
    // delete client
    $clientID = 6;
    $resp = sendRequest('DELETE', $restAPIBaseURL."/api.php/clients/$clientID");
    $result = json_decode($resp, true);
    // Process the response
    var_dump($result);
} catch (Exception $e) {
    echo 'Caught exception deleting client by ID: ',  $e->getMessage(), "\n";
}

?>