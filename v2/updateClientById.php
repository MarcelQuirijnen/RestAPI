<?php

require_once 'curl_helper.php';
$restAPIBaseURL = 'http://localhost';

try {
    // Update client
    $clientID = 1;
    $data = [
        'cl_name' => 'John Doe the 2nd',
        'cl_email' => 'john.doe2@example.com',
        'cl_phone' => '870-123-1234',
        'cl_address' => '123 someStreet, someCity, someState 12345',
        'cl_onboarded' => '2024-05-09',
    ];
    $resp = sendRequest('PUT', $restAPIBaseURL."/api.php/clients/$clientID", json_encode($data));
    //var_dump($resp);
    $result = json_decode($resp, true);
    print_r($result);
} catch (Exception $e) {
    echo 'Caught exception updating client by ID: ',  $e->getMessage(), "\n";
}

?>