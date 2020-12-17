<?php 
	require 'db_connect.php';

	//january
	$janFirst=strtotime("first day of January");
	$janLast=strtotime("last day of January");

	$janStart=date('Y-m-d',$janFirst);
	$janEnd=date('Y-m-d',$janLast);

	$sql="SELECT COALESCE(SUM(total),0) AS total FROM orders WHERE orderdate BETWEEN :value1 AND :value2";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':value1',$janStart);
	$stmt->bindParam(':value2',$janEnd);
	$stmt->execute();
	$janResult=$stmt->fetch(PDO::FETCH_ASSOC);

	//var_dump($janResult);
	//february
	$febFirst=strtotime("first day of February");
	$febLast=strtotime("last day of February");

	$febStart=date('Y-m-d',$febFirst);
	$febEnd=date('Y-m-d',$febLast);

	$sql="SELECT COALESCE(SUM(total),0) AS total FROM orders WHERE orderdate BETWEEN :value1 AND :value2";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':value1',$febStart);
	$stmt->bindParam(':value2',$febEnd);
	$stmt->execute();
	$febResult=$stmt->fetch(PDO::FETCH_ASSOC);

	//march
	$marFirst=strtotime("first day of March");
	$marLast=strtotime("last day of March");

	$marStart=date('Y-m-d',$marFirst);
	$marEnd=date('Y-m-d',$marLast);

	$sql="SELECT COALESCE(SUM(total),0) AS total FROM orders WHERE orderdate BETWEEN :value1 AND :value2";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':value1',$marStart);
	$stmt->bindParam(':value2',$marEnd);
	$stmt->execute();
	$marResult=$stmt->fetch(PDO::FETCH_ASSOC);

	//april
	$aprilFirst=strtotime("first day of April");
	$aprilLast=strtotime("last day of April");

	$aprilStart=date('Y-m-d',$aprilFirst);
	$aprilEnd=date('Y-m-d',$aprilLast);

	$sql="SELECT COALESCE(SUM(total),0) AS total FROM orders WHERE orderdate BETWEEN :value1 AND :value2";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':value1',$aprilStart);
	$stmt->bindParam(':value2',$aprilEnd);
	$stmt->execute();
	$aprilResult=$stmt->fetch(PDO::FETCH_ASSOC);

	//may
	$mayFirst=strtotime("first day of May");
	$mayLast=strtotime("last day of May");

	$mayStart=date('Y-m-d',$mayFirst);
	$mayEnd=date('Y-m-d',$mayLast);

	$sql="SELECT COALESCE(SUM(total),0) AS total FROM orders WHERE orderdate BETWEEN :value1 AND :value2";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':value1',$mayStart);
	$stmt->bindParam(':value2',$mayEnd);
	$stmt->execute();
	$mayResult=$stmt->fetch(PDO::FETCH_ASSOC);

	//june
	$juneFirst=strtotime("first day of June");
	$juneLast=strtotime("last day of June");

	$juneStart=date('Y-m-d',$juneFirst);
	$juneEnd=date('Y-m-d',$juneLast);

	$sql="SELECT COALESCE(SUM(total),0) AS total FROM orders WHERE orderdate BETWEEN :value1 AND :value2";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':value1',$juneStart);
	$stmt->bindParam(':value2',$juneEnd);
	$stmt->execute();
	$juneResult=$stmt->fetch(PDO::FETCH_ASSOC);

	//july
	$julFirst=strtotime("first day of July");
	$julLast=strtotime("last day of July");

	$julStart=date('Y-m-d',$julFirst);
	$julEnd=date('Y-m-d',$julLast);

	$sql="SELECT COALESCE(SUM(total),0) AS total FROM orders WHERE orderdate BETWEEN :value1 AND :value2";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':value1',$julStart);
	$stmt->bindParam(':value2',$julEnd);
	$stmt->execute();
	$julResult=$stmt->fetch(PDO::FETCH_ASSOC);

	//august
	$augFirst=strtotime("first day of August");
	$augLast=strtotime("last day of August");

	$augStart=date('Y-m-d',$augFirst);
	$augEnd=date('Y-m-d',$augLast);

	$sql="SELECT COALESCE(SUM(total),0) AS total FROM orders WHERE orderdate BETWEEN :value1 AND :value2";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':value1',$augStart);
	$stmt->bindParam(':value2',$augEnd);
	$stmt->execute();
	$augResult=$stmt->fetch(PDO::FETCH_ASSOC);

	//september
	$sepFirst=strtotime("first day of September");
	$sepLast=strtotime("last day of September");

	$sepStart=date('Y-m-d',$sepFirst);
	$sepEnd=date('Y-m-d',$sepLast);

	$sql="SELECT COALESCE(SUM(total),0) AS total FROM orders WHERE orderdate BETWEEN :value1 AND :value2";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':value1',$sepStart);
	$stmt->bindParam(':value2',$sepEnd);
	$stmt->execute();
	$sepResult=$stmt->fetch(PDO::FETCH_ASSOC);

	//october
	$octFirst=strtotime("first day of October");
	$octLast=strtotime("last day of October");

	$octStart=date('Y-m-d',$octFirst);
	$octEnd=date('Y-m-d',$octLast);

	$sql="SELECT COALESCE(SUM(total),0) AS total FROM orders WHERE orderdate BETWEEN :value1 AND :value2";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':value1',$octStart);
	$stmt->bindParam(':value2',$octEnd);
	$stmt->execute();
	$octResult=$stmt->fetch(PDO::FETCH_ASSOC);

	//November
	$novFirst=strtotime("first day of November");
	$novLast=strtotime("last day of November");

	$novStart=date('Y-m-d',$novFirst);
	$novEnd=date('Y-m-d',$novLast);

	$sql="SELECT COALESCE(SUM(total),0) AS total FROM orders WHERE orderdate BETWEEN :value1 AND :value2";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':value1',$novStart);
	$stmt->bindParam(':value2',$novEnd);
	$stmt->execute();
	$novResult=$stmt->fetch(PDO::FETCH_ASSOC);

	//December
	$decFirst=strtotime("first day of December");
	$decLast=strtotime("last day of December");

	$decStart=date('Y-m-d',$decFirst);
	$decEnd=date('Y-m-d',$decLast);

	$sql="SELECT COALESCE(SUM(total),0) AS total FROM orders WHERE orderdate BETWEEN :value1 AND :value2";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':value1',$decStart);
	$stmt->bindParam(':value2',$decEnd);
	$stmt->execute();
	$decResult=$stmt->fetch(PDO::FETCH_ASSOC);
	//var_dump($decEnd);die();
	$total=array (
		$janResult['total'],$febResult['total'],$marResult['total'],$aprilResult['total'],$mayResult['total'],
		$juneResult['total'],$julResult['total'],$augResult['total'],$sepResult['total'],$octResult['total'],
		$novResult['total'],$decResult['total']
	);

	//var_dump($total);die();
	echo json_encode($total);

?>