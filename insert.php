<?php
// Database connection
$host = 'localhost';   
$dbname = 'Kaveesh';    
$username = 'root';  
$password = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}


if (isset($_POST['insert'])) {
    // Get the form data
    $p_id = $_POST['p_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $benefit1 = $_POST['benefit_1'];
    $benefit2 = $_POST['benefit_2'];
    $benefit3 = $_POST['benefit_3'];
    $benefit4 = $_POST['benefit_4'];
    $benefit5 = $_POST['benefit_5'];

    // Prepare the insert statement
    $sql = "INSERT INTO packages (p_id, name, price, benefits_1, benefits_2, benefits_3, benefits_4, benefits_5) 
            VALUES (:p_id, :name, :price, :benefit1, :benefit2, :benefit3, :benefit4, :benefit5)";

    // Execute the statement
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':p_id', $p_id, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_STR);
    $stmt->bindParam(':benefit1', $benefit1, PDO::PARAM_STR);
    $stmt->bindParam(':benefit2', $benefit2, PDO::PARAM_STR);
    $stmt->bindParam(':benefit3', $benefit3, PDO::PARAM_STR);
    $stmt->bindParam(':benefit4', $benefit4, PDO::PARAM_STR);
    $stmt->bindParam(':benefit5', $benefit5, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo "New record inserted successfully.";
    } else {
        echo "Failed to insert the record.";
    }
} else {
    echo "No data provided for insertion.";
}
?>
<style>
    form {
        width: 300px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        background-color: #f9f9f9;
    }
    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }
    input[type="text"], input[type="submit"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>

<form action="insert_package.php" method="POST">
    <label for="p_id">Package ID:</label>
    <input type="text" name="p_id" required><br>
    <label for="name">Name:</label>
    <input type="text" name="name" required><br>
    <label for="price">Price:</label>
    <input type="text" name="price" required><br>
    <label for="benefit_1">Benefit 1:</label>
    <input type="text" name="benefit_1" required><br>
    <label for="benefit_2">Benefit 2:</label>
    <input type="text" name="benefit_2" required><br>
    <label for="benefit_3">Benefit 3:</label>
    <input type="text" name="benefit_3" required><br>
    <label for="benefit_4">Benefit 4:</label>
    <input type="text" name="benefit_4" required><br>
    <label for="benefit_5">Benefit 5:</label>
    <input type="text" name="benefit_5" required><br>
    <input type="submit" name="insert" value="Insert Package">
</form>
