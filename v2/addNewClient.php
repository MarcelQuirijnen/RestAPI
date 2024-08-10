<?php

require_once 'curl_helper.php';
$restAPIBaseURL = 'http://localhost';

try {
    // Add new client
    $data = [
        'cl_name' => 'John Doe',
        'cl_email' => 'john.doe@example.com',
        'cl_phone' => '870-123-4567',
        'cl_address' => '123 someStreet, someCity, someState 12345',
        'cl_onboarded' => '2024-05-08',
    ];
    $resp = sendRequest('POST', $restAPIBaseURL.'/api.php/clients', json_encode($data));
    $result = json_decode($resp, true);
    print_r($result);
} catch (Exception $e) {
    echo 'Caught exception adding new client: ',  $e->getMessage(), "\n";
}

?>