<?php
// Delete a product by ID
include 'db.php';
/* @var $pdo PDO */

//TODO: Complete the code to handle product deletion request and delete the product from the database
// Check if ID is provided
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']);
    
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = :id");
    
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
    $stmt->execute();
}

header("Location: index.php");
exit();