<?php 

include('inventoryCode.php');
$all = selectAll();




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

	<title>Inventory</title>
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
        
			<h1>Inventory</h1>

            <table class="table">
                <tr>
                    <td><strong>ID</strong></td>
                    <td><strong>SKU</strong></td>
                    <td><strong>Location</strong></td>
                    <td><strong>Amount</strong></td>
                    <td><strong>Date Added</strong></td>
                </tr>
                <?php foreach($all as $row) : ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['sku']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                        <td><?php echo $row['amount']; ?></td>
                        <td><?php echo $row['date_added']; ?></td>
                    </tr>
                <?php endforeach ?>
            </table>

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