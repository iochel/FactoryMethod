<?php
$host = "localhost"; 
$username = "root";
$password = "";
$database = "MyFactoryDatabase";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Abstract Factory Interface
interface Factory {
    public function create($data);
    public function getList();
}

// Concrete Customer Factory
class CustomerFactory implements Factory {
    public function create($data) {
        global $conn;
        $sql = "INSERT INTO customer (firstname, lastname, contact_number, address) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssss", $data['firstname'], $data['lastname'], $data['contact_number'], $data['address']);
            if ($stmt->execute()) {
                return "Customer added successfully!";
            }
        }
        return "Error: " . $sql . "<br>" . $conn->error;
    }

    public function getList() {
        global $conn;
        $sql = "SELECT * FROM customer";
        $result = $conn->query($sql);

        if ($result === false) {
            return "Error: " . $conn->error;
        }

        if ($result->num_rows > 0) {
            $customerList = array();
            while ($row = $result->fetch_assoc()) {
                $customerList[] = $row;
            }
            return $customerList;
        } else {
            return "No customers found.";
        }
    }
}

// Concrete Supplier Factory
class SupplierFactory implements Factory {
    public function create($data) {
        global $conn;
        $sql = "INSERT INTO supplier (firstname, lastname, contact_number, address) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssss", $data['supplier_firstname'], $data['supplier_lastname'], $data['supplier_contact_number'], $data['supplier_address']);
            if ($stmt->execute()) {
                return "Supplier added successfully!";
            }
        }
        return "Error: " . $sql . "<br>" . $conn->error;
    }

    public function getList() {
        global $conn;
        $sql = "SELECT * FROM supplier";
        $result = $conn->query($sql);

        if ($result === false) {
            return "Error: " . $conn->error;
        }

        if ($result->num_rows > 0) {
            $supplierList = array();
            while ($row = $result->fetch_assoc()) {
                $supplierList[] = $row;
            }
            return $supplierList;
        } else {
            return "No suppliers found.";
        }
    }
}
?>
