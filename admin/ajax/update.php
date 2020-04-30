<?php 
include('../includes/config.php');
$sql44 ="SELECT (SELECT COUNT(id) FROM tbltestimonial WHERE status is NULL or status = '0') AS newtestimonial, (SELECT COUNT(id) FROM tblcontactusquery WHERE status is NULL) AS newquery, (SELECT COUNT(id) FROM tblbooking WHERE Status = '0') AS newbooking";
$query44= $dbh -> prepare($sql44);
$query44->execute();
$results44=$query44->fetchAll(PDO::FETCH_OBJ);
if($query44->rowCount() > 0)
{
	foreach($results44 as $result){
		$ntestimonial = $result->newtestimonial;
		$nquery = $result->newquery;
		$nbooking = $result->newbooking;
	}
}
else {
	$ntestimonial = '';
	$nquery = '';
	$nbooking = '';
}
$arr = array();
array_push($arr, $nbooking);
array_push($arr, $nquery);
array_push($arr, $ntestimonial);
echo json_encode($arr);
 ?>