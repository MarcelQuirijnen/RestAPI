<?php

class Client {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllClients() {
        $clients = $this->conn->query("SELECT * FROM client");
        return $clients->fetch_all(MYSQLI_ASSOC);
    }

    public function getClientById($id) {
        // param validation (id) should be done
        $stmt = $this->conn->prepare('SELECT * FROM client WHERE id = ?');
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $client = $result->fetch_assoc();
        return $client;
    }
    
    public function addClient($data) {
        // should do param validation
        $stmt = $this->conn->prepare('INSERT INTO css.client (cl_name, cl_email, cl_phone, cl_address, cl_onboarded)
                                      VALUES (?,?,?,?,?)');
        $stmt->bind_param("sssss", $data['cl_name'], 
                                   $data['cl_email'], 
                                   $data['cl_phone'], 
                                   $data['cl_address'], 
                                   $data['cl_onboarded']);                                      
        return $stmt->execute();
    }

    public function updateClient($id, $data) {
        // param validation should be done here
        $stmt = $this->conn->prepare('UPDATE client SET 
                                        $cl_name = ?,
                                        $cl_email = ?,
                                        $cl_phone = ?,
                                        $cl_address = ?,
                                        $cl_onboarded = ?
                                      WHERE id = ?');
        $stmt->bind_param("sssssi", $data['cl_name'], 
                                    $data['cl_email'], 
                                    $data['cl_phone'], 
                                    $data['cl_address'], 
                                    $data['cl_onboarded'],
                                    $id);                                       
        return $stmt->execute();
    }

    public function deleteClient($id) {
        // param validation should be done here
        $stmt = $this->conn->prepare('DELETE FROM client WHERE id = ?');
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
