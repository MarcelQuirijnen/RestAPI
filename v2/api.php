<?php

require_once 'config.php';
require_once 'client.php';

// Create an instance of the Client class
$clientObj = new Client($conn);
// Get the request method
$method = $_SERVER['REQUEST_METHOD'];
// Get the requested endpoint
$endpoint = $_SERVER['PATH_INFO'];
// Set the response content type
header('Content-Type: application/json');

// Process the request
switch ($method) {
    case 'GET':
        if ($endpoint === '/clients') {
            // Get all clients
            $clients = $clientObj->getAllClients();
            echo json_encode($clients);
        } elseif (preg_match('/^\/clients\/(\d+)$/', $endpoint, $matches)) {
            // Get client by ID
            $clientId = $matches[1];
            $client = $clientObj->getclientById($clientId);
            echo json_encode($client);
        }
        break;
    case 'POST':
        if ($endpoint === '/clients') {
            // Add new client
            $data = json_decode(file_get_contents('php://input'), true);
            $result = $clientObj->addclient($data);
            echo json_encode(['success' => $result]);
        }
        break;
    case 'PUT':
        if (preg_match('/^\/clients\/(\d+)$/', $endpoint, $matches)) {
            // Update client by ID
            $clientId = $matches[1];
            $data = json_decode(file_get_contents('php://input'), true);
            $result = $clientObj->updateclient($clientId, $data);
            echo json_encode(['success' => $result]);
        }
        break;
    case 'DELETE':
        if (preg_match('/^\/clients\/(\d+)$/', $endpoint, $matches)) {
            // Delete client by ID
            $clientId = $matches[1];
            $result = $clientObj->deleteclient($clientId);
            echo json_encode(['success' => $result]);
        }
        break;
}
?>