<?php
$conn = mysqli_connect("localhost","root","","hotel_booking");

// Find expired unpaid bookings (10 mins)
$q = mysqli_query($conn,"
SELECT id, room_type, rooms 
FROM bookings 
WHERE payment_status='Unpaid' 
AND created_at < NOW() - INTERVAL 10 MINUTE
");

while($b = mysqli_fetch_assoc($q)){

    // Restore inventory
    mysqli_query($conn,"
    UPDATE room_inventory 
    SET available_rooms = available_rooms + {$b['rooms']}
    WHERE room_type='{$b['room_type']}'
    ");

    // Delete booking
    mysqli_query($conn,"DELETE FROM bookings WHERE id={$b['id']}");
}
?>
