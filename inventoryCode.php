<?php
include('../connection.php');
/****************
select all function
*****************/
function selectAll(){
		include('../connection.php');
		try{
		$results = $db->query("SELECT * FROM inventory");
	} catch (Exception $e){
		echo " no shit here";
		exit;
	}

	$entire_db = $results->fetchAll(PDO::FETCH_ASSOC);
	return $entire_db;

}



/*************************
single item query function
**************************/

function selectSome($id){
		include('../connection.php');
		try{
		$results = $db->query("SELECT  sku, location, amount, date_added FROM inventory WHERE id = $id");
	} catch (Exception $e){
		echo " no shit here";
		exit;
	}

	$catalog = $results->fetch(PDO::FETCH_ASSOC);
	return $catalog;

}



/******************
 add data function
 ******************/

 function addData($sku, $location, $amount){
 	include('../connection.php');

 	$sql = 'INSERT INTO inventory(sku, location, amount) VALUES(?,?,?)';
 	try{
 		$results = $db->prepare($sql);
 		$results->bindValue(1,$sku, PDO::PARAM_STR);
 		$results->bindValue(2,$location, PDO::PARAM_STR);
 		$results->bindValue(3,$amount, PDO::PARAM_STR);
 		$results->execute();
 	} catch(Execption $e){
 		echo "Error!:" . $e->getMessage(). "<br />
 		";
 		return false;
 	}

 	return true;
 }

/*************************
sku array function
**************************/

function skuArray(){
		include('../connection.php');

		try{
		$results = $db->query("SELECT sku FROM inventory");
	} catch (Exception $e){
		echo " no shit here";
		exit;
	}

	$skus = $results->fetchAll(PDO::FETCH_COLUMN);
	return $skus;

}



// function updateAmount(){
// 	include('../connection.php');

// 	try{
// 		$results = $db->query("UPDATE inventory SET amount='$quantity' WHERE sku = '$skuSelect'");
	
// 	}catch (Exception $e){
// 		echo "nada";
// 		exit;
// 	}

// 	return $results;
// 	echo $results;
// }





