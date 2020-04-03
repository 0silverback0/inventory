<?php


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

