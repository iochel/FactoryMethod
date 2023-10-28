<!DOCTYPE html>
<html>
<head>
<style>
        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
    </style>
    <title>Customer and Supplier Management</title>
</head>
<body>
    <div class="navbar">
        <a href="#" onclick="toggleManageCustomers()">Manage Add Customers</a>
        <a href="#" onclick="toggleManageSuppliers()">Manage Add Suppliers</a>
        <a href="#" onclick="viewCustomerList()">View Customer List</a>
        <a href="#" onclick="viewSupplierList()">View Supplier List</a>
        <a href="index.php" onclick="viewSupplierList()">Admin dashboard</a>
    </div>  
   

    <!-- Customer Management Section -->
    <div id="customerSection" style="display: none;">
        <h2>Manage Customers</h2>
        <form action="dashboard.php" method="post">
            <input type="hidden" name="action" value="add_customer">
            <label for="firstname">First Name:</label>
            <input type="text" name="firstname" required><br><br>
            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" required><br><br>
            <label for="contact_number">Contact Number:</label>
            <input type="text" name="contact_number" required><br><br>
            <label for="address">Address:</label>
            <input type="text" name="address" required><br><br>
            <input type="submit" value="Add Customer">
        </form>
    </div>

    <!-- Supplier Management Section -->
    <div id="supplierSection" style="display: none;">
        <h2>Manage Suppliers</h2>
        <form action="dashboard.php" method="post">
            <input type="hidden" name="action" value="add_supplier">
            <label for="supplier_firstname">First Name:</label>
            <input type="text" name="supplier_firstname" required><br><br>
            <label for="supplier_lastname">Last Name:</label>
            <input type="text" name="supplier_lastname" required><br><br>
            <label for="supplier_contact_number">Contact Number:</label>
            <input type="text" name="supplier_contact_number" required><br><br>
            <label for="supplier_address">Address:</label>
            <input type="text" name="supplier_address" required><br><br>
            <input type="submit" value="Add Supplier">
        </form>
    </div>

    <!-- Customer List Section -->
    <div id="customerList" style="display: none;">
        <?php
        include 'db.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
            if ($_POST['action'] === 'add_customer') {
                // Process the form to add a new customer
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $contact_number = $_POST['contact_number'];
                $address = $_POST['address'];

                $sql = "INSERT INTO customer (firstname, lastname, contact_number, address) VALUES ('$firstname', '$lastname', '$contact_number', '$address')";

                if ($conn->query($sql) === TRUE) {
                    echo "Customer added successfully!";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }

        $sql = "SELECT * FROM customer";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Customer List</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Customer ID</th><th>First Name</th><th>Last Name</th><th>Contact Number</th><th>Address</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td><td>" . $row["contact_number"] . "</td><td>" . $row["address"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No customers found.";
        }
        ?>
    </div>

    <!-- Supplier List Section -->
    <div id="supplierList" style="display: none;">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
            if ($_POST['action'] === 'add_supplier') {
                // Process the form to add a new supplier
                $supplier_firstname = $_POST['supplier_firstname'];
                $supplier_lastname = $_POST['supplier_lastname'];
                $supplier_contact_number = $_POST['supplier_contact_number'];
                $supplier_address = $_POST['supplier_address'];

                $sql = "INSERT INTO supplier (firstname, lastname, contact_number, address) VALUES ('$supplier_firstname', '$supplier_lastname', '$supplier_contact_number', '$supplier_address')";

                if ($conn->query($sql) === TRUE) {
                    echo "Supplier added successfully!";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }

        $sql = "SELECT * FROM supplier";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Supplier List</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Supplier ID</th><th>First Name</th><th>Last Name</th><th>Contact Number</th><th>Address</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td><td>" . $row["contact_number"] . "</td><td>" . $row["address"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No suppliers found.";
        }
        ?>
    </div>

    <script type="text/javascript" src="javascript.js"></script>
</body>
</html>
