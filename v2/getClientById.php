<?php

require_once 'curl_helper.php';
$restAPIBaseURL = 'http://localhost';

try {
    // Get client by ID
    $clientID = 1;
    $resp = sendRequest('GET', $restAPIBaseURL."/api.php/clients/$clientID");
    $result = json_decode($resp, true);
    // Process the response
    var_dump($result);
} catch (Exception $e) {
    echo 'Caught exception getting client by ID: ',  $e->getMessage(), "\n";
}

?>