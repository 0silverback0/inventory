<?php 
 include('../connection.php');
 include('inventoryCode.php');
/*
	$query = "SELECT * FROM inventory";
	$result = $db->query($query);

	if(isset($_POST["submit"])){
 	function validateFormData($formData){
 		$formData = trim(stripslashes(htmlspecialchars($formData)));
 		return $formData;
 }
	//check to see if inputs are empty
	// create varibles with form data
	// wrap data with our function

	// set all variables to empty by default
	$sku = $location = $amount = "";
	

	$sql = $db->query("SELECT sku FROM inventory");
	//make container for array from database
	$arr = [];
	//fetch array from database and store in container
	while($row = mysqli_fetch_array($sql)){
		$arr[] = $row['sku'];

		
	}

	// check to see if location is unique

	$sql2 = mysqli_query($conn,"SELECT location FROM inventory");
$arr2 =[];
while($row2 = mysqli_fetch_array($sql2)){
	$arr2[] = $row2['location'];
}
	// prints all contents in array
	//print_r($arr);

	//checks to see if number is in array
	if(in_array($sku, $arr)){
		echo "<div class='alert alert-danger'>This SKU is already in Database</div>";
	}

	if(in_array($location,$arr2)){
		echo "<div class='alert alert-danger'> This Location is already taken</div>";
	}





	// check to see if each variable has data
	if(@$sku && @$location && @$amount ){

	$query = "INSERT INTO inventory (id, sku, location, amount, date_added) VALUES (NULL, '$sku', '$location', '$amount', CURRENT_TIMESTAMP)";

	if(mysqli_query($conn,$query)){
		echo "<div class='alert alert-success'>New SKU in Inventory</div>";
	} 
}
}
*/

$sql = $db->prepare("SELECT sku, location FROM inventory");
$sql->execute();
$array = $sql->fetchAll(PDO::FETCH_COLUMN);

$sql2 = $db->prepare("SELECT location FROM inventory");
$sql2->execute();
$array2 = $sql2->fetchAll(PDO::FETCH_COLUMN);


//////////////////
if(isset($_POST['submit'])){
	$sku = $location = $amount = "";
if(!$_POST["sku"]){
		$skuError = "enter sku";
	} else{
		$sku =  trim(filter_input(INPUT_POST,"sku", FILTER_SANITIZE_NUMBER_INT));
	}

	if(!$_POST["location"]){
		$locationError = " enter location";
	} else{
		$location = trim(filter_input(INPUT_POST,"location", FILTER_SANITIZE_STRING));
	}

	if(!$_POST["amount"]){
		$amountError = "enter amount";
	} else{
		$amount = trim(filter_input(INPUT_POST,"amount",FILTER_SANITIZE_NUMBER_INT));
	}
}
//////////////////////

if(empty(@$sku || @$location || @$amount)){
	$skuError = "Enter Sku";
	$locationError = "Enter location";
	$amountError = "Enter amount";

	
}

if(in_array(@$sku,$array)){
	$skuAlert = "<div class='alert alert-danger'> this sku is here </div>";

	
}

if(in_array(@$location, $array2)){
	$locationAlert = "<div class='alert alert-danger'>this location is filled</div>";
	
}

if(@$sku && @$location && @$amount){
	addData($sku, $location, $amount);
	header('Location: inventory.php');	
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
    
    <link rel="stylesheet" type="text/css" href="inventory.css?v=<?php echo time(); ?>">

	<title>Add Inventory</title>
</head>
<header>
	<nav>
		<a href="addInventory.php">Add</a>
		<a href="updateAmount.php">Update</a>
		<a href="deleteInventory.php">Delete</a>
		<a href="inventory.php">View</a>

	</nav>
</header>
<div class="container">


<?php echo @$error_message;?>
<h1>Add Inventory</h1>



	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

		<?php echo @$skuAlert; ?>
		<?php echo @$locationAlert; ?>

		<small class="text-danger">*<?php echo @$skuError; ?></small>
		<input class="form-control" type="text" placeholder="sku" name="sku">

		<small class="text-danger">*<?php echo @$locationError; ?></small>
		<input class="form-control" type="text" placeholder="location" name="location">

		<small class="text-danger">*<?php echo @$amountError; ?></small>
		<input class="form-control" type="number" placeholder="amount" name="amount">

		<input class="submitBtn" type="submit" name="submit">
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