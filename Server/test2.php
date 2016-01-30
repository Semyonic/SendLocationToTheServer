<?php 
header('Content-type: text/plain; charset=utf-8');
$db_conn = new  PDO('mysql:host=localhost;dbname=Locations','root','dYn6fGF0');
$db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$message = "";
$lati = ($_POST['lati']); 
$longt = ($_POST['longt']);

$qry = $db_conn->prepare('INSERT INTO  Location(`latitude`,`longitude`) VALUES (:lati,:longt)');
$qry->bindParam(':lati', $lati);
$qry->bindParam(':longt', $longt);
$qry->execute();

if ($qry) { $message = "success"; }
else { $message = "failed"; }

echo utf8_encode($message);
?>
