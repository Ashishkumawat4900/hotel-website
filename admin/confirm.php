<?php
$conn = mysqli_connect("localhost","root","","hotel_booking");
if(!$conn) die("DB Error");

$id = (int)$_GET['id'];

mysqli_query($conn,"
UPDATE bookings 
SET status='Confirmed'
WHERE id=$id
");

header("Location: dashboard.php");
exit;
?>
