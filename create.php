<!-- Add a new product -->
<?php
include 'db.php';
/* @var $pdo PDO */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //TODO: Complete the code to handle form submission and insert a new product into the database
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $price = isset($_POST['price']) ? floatval($_POST['price']) : 0;
    
    if (empty($name) || $price <= 0) {
        // Handle validation error (you could show an error message)
        // But for simplicity, we'll just redirect back
        header("Location: create.php");
        exit();
    }
    
    $stmt = $pdo->prepare("INSERT INTO products (name, price) VALUES (:name, :price)");
    
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_STR);
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>
<html>
<head>
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h1 class="mb-4">Add Product</h1>
    <form method="post" class="bg-white p-4 rounded shadow-sm">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Add</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>