<?php

function sendRequest($method = 'GET', $url, $data = [])
{
    $apiKey = '1234567890';

    ob_start();
    $out = fopen('php://output', 'w');

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
        CURLOPT_HTTPHEADER => [
            "x-api-key: $apiKey",
            'Content-Type: application/json'
        ],
        CURLOPT_VERBOSE => true,
        CURLOPT_STDERR => $out,
      ]);

    // Set request method
    switch ($method) {
        case 'GET':
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            break;
        case 'POST':
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            break;
        case 'PUT':
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            break;
        case 'DELETE':
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
            break;
    }
    $response = curl_exec($ch);
    fclose($out);
    $data = ob_get_clean();
    $data .= PHP_EOL . $response . PHP_EOL;
    //echo $data;
    //var_dump($response);
    //$err = curl_error($ch);
    //echo $err;
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return json_encode(['response' => $response, 'http_code' => $httpCode]);
}

?>