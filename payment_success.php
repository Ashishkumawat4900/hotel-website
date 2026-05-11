```php
<?php

$conn = mysqli_connect("localhost","root","","hotel_booking");

if(!$conn){
    die("DB Error");
}

$id = (int)$_GET['id'];

$payment_id = $_GET['payment_id'];

if(empty($payment_id)){
    die("Payment Failed");
}

// UPDATE PAYMENT STATUS
mysqli_query($conn,"
UPDATE bookings
SET payment_status='Paid',
status='Confirmed'
WHERE id=$id
");

// GET BOOKING INFO
$q = mysqli_query($conn,"
SELECT room_type, rooms
FROM bookings
WHERE id=$id
");

$d = mysqli_fetch_assoc($q);

// REDUCE INVENTORY
mysqli_query($conn,"
UPDATE room_inventory
SET available_rooms = available_rooms - {$d['rooms']}
WHERE room_type='{$d['room_type']}'
");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Success</title>
</head>
<body>

<h1>✅ Payment Successful</h1>

<p>Your booking has been confirmed.</p>

<p>Payment ID: <?= $payment_id ?></p>

<a href="index.html">Go Home</a>

</body>
</html>
```