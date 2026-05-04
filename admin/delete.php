<?php
$conn = mysqli_connect("localhost","root","","hotel_booking");
if(!$conn) die("DB Error");

$id = (int)$_GET['id'];

// Fetch booking details
$q = mysqli_query($conn,"
SELECT room_type, rooms, payment_status 
FROM bookings 
WHERE id=$id
");
$data = mysqli_fetch_assoc($q);

// Restore inventory ONLY if booking was confirmed
if ($data['payment_status'] == 'Paid') {
    mysqli_query($conn,"
    UPDATE room_inventory 
    SET available_rooms = available_rooms + {$data['rooms']}
    WHERE room_type='{$data['room_type']}'
    ");
}

// Delete booking
mysqli_query($conn,"DELETE FROM bookings WHERE id=$id");

header("Location: dashboard.php");
exit;
?>
