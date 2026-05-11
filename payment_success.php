<?php
$conn = mysqli_connect("localhost","root","","hotel_booking");
$id = (int)$_GET['id'];

// CONFIRM PAYMENT
mysqli_query($conn,"
UPDATE bookings
SET payment_status='Paid', status='Confirmed'
WHERE id=$id
");

// REDUCE INVENTORY
$q = mysqli_query($conn,"SELECT room_type, rooms FROM bookings WHERE id=$id");
$d = mysqli_fetch_assoc($q);

mysqli_query($conn,"
UPDATE room_inventory
SET available_rooms = available_rooms - {$d['rooms']}
WHERE room_type='{$d['room_type']}'
");

echo "<h2>✅ Payment Successful</h2>";
echo "<a href='index.html'>Go Home</a>";
?>
