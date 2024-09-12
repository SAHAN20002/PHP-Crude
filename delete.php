<?php
// Database connection
$host = 'localhost';   
$dbname = 'Kaveesha';   
$username = 'root';  
$password = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

if (isset($_GET['p_id'])) {
    // Get the package ID from the query string
    $package_id = $_GET['p_id'];

    // Prepare the delete statement
    $sql = "DELETE FROM packages WHERE p_id = :p_id";
    
    // Execute the statement
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':p_id', $package_id, PDO::PARAM_STR);
    
    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Failed to delete the record.";
    }
} else {
    echo "No package ID provided for deletion.";
}
?>
