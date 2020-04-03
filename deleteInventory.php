<?php
include('../connection.php');
include('inventoryCode.php');

/*///////////////////
	Delete inventory
////////////////////*/

/*
//run query and get array of skus

$sqlLoc = $db->query("SELECT sku FROM inventory");
	$skuArr = [];

	while($sho = $sqlLoc->fetch_array($sqlLoc)){
		$skuArr[] = $sho['sku'];
	}

	$error = "<div class='alert alert-danger'>This sku doesnt exist</div>";

//check if button is set and set variable

if(isset($_POST['delete'])){
	@$del = $_POST['skuDelete'];
}

// check to see if sku is in array
if(!in_array(@$del, $skuArr)){
		echo $error;//"<div class='alert alert-danger'>This sku doesnt exist</div>";
		
} else{
mysqli_query($conn, "DELETE FROM inventory WHERE sku = $del");
	echo "<div class='alert alert-success'> SKU has been deleted from inventory</div>";
}*/

$sql = $db->prepare("SELECT sku, location FROM inventory");
$sql->execute();
$array = $sql->fetchAll(PDO::FETCH_COLUMN);

$sql2 = $db->prepare("SELECT location FROM inventory");
$sql2->execute();
$array2 = $sql2->fetchAll(PDO::FETCH_COLUMN);


if(isset($_POST['delete'])){
	@$delete = trim(filter_input(INPUT_POST,"skuDelete", FILTER_SANITIZE_STRING));
	//echo $delete;

if(empty(@$delete)){
	$delError = "<div class='alert alert-danger'>This SKU doesn't exist</div>";
}
		
		try{
		$results = $db->query("DELETE FROM  inventory WHERE sku = $delete");
		
		
	} catch (Exception $e){
		echo " no shit here";
		exit;
	}

if($delete){
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
	<title>Delete Inventory</title>
</head>
<body>

	<header>
	<nav>
		<a  href="addInventory.php">Add</a>
		<a href="updateAmount.php">Update</a>
		<a href="deleteInventory.php">Delete</a>
		<a href="inventory.php">View</a>

	</nav>
</header>

	<div class="container">
		<h1>Delete Inventory</h1>
		<form action="deleteInventory.php" method="post">

			<?php echo @$delError; ?>
			<input class="form-control" type="text" name="skuDelete" placeholder="Enter Sku">
			<input class="submitBtn" type="submit" name="delete">
		</form>
	</div>

	




<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    
    
<footer class="navbar fixed-bottom">
	
</footer>

</body>
</html>