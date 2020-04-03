<?php

include('../connection.php');
include('inventoryCode.php');



$sql = $db->prepare("SELECT sku, location FROM inventory");
$sql->execute();
$array = $sql->fetchAll(PDO::FETCH_COLUMN);

$sql2 = $db->prepare("SELECT location FROM inventory");
$sql2->execute();
$array2 = $sql2->fetchAll(PDO::FETCH_COLUMN);
	
$skuSelect = $quantity = "";


if(isset($_POST['add_quantity'])){
	@$skuSelect = trim(filter_input(INPUT_POST,'select_sku',FILTER_SANITIZE_NUMBER_INT));

	@$quantity = trim(filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT));

	
	$results = $db->query("UPDATE inventory SET amount='$quantity', date_added=current_timestamp WHERE sku = '$skuSelect'");
 
 if(!in_array($skuSelect,$array)){
 	$noExist = "<div class='alert alert-danger'> This SKU is not in database </div>";
 	 }

 if(empty($skuSelect)){
 	$skuEmpty = "<div class='alert alert-danger'> Empty amount</div>";
 	//echo $skuEmpty;
 }

 if(empty($quantity)){
 	$amountEmpty = "<div class='alert alert-danger'> Empty amount</div>";
 	//echo $amountEmpty;
 }

 if($skuSelect && $quantity){
 	header('Location: inventory.php');
 }

	
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="inventory.css?v=<?php echo time(); ?>">
	<title>Update Quantity</title>
</head>
<body>

	<header>
	<nav>
		<a class="fun" href="addInventory.php">Add</a>
		<a href="updateAmount.php">Update</a>
		<a href="deleteInventory.php">Delete</a>
		<a href="inventory.php">View</a>

	</nav>
</header>
	<div class="container">
		<h1>Update Quantity</h1>

		<form action="updateAmount.php" method="post">

			<?php echo @$noExist; ?>
			<?php echo @$amountEmpty; ?>
			<small class="text-danger">*<?php echo @$selectError; ?></small>
			<input class="form-control" type="text" name="select_sku" placeholder="Select SKU">
			<small class="text-danger">* <?php echo @$quantityError; ?></small>
			<input class="form-control" type="number" name="quantity" placeholder="add quantity">
			<input class="submitBtn" type="submit" name="add_quantity">
		</form>
	</div>

	<footer class="navbar fixed-bottom">
		
	</footer>
	

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>