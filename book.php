<?php
$conn = mysqli_connect("localhost","root","","hotel_booking");
if(!$conn) die("DB Error");

// FORM DATA
$name     = $_POST['name'];
$email    = $_POST['email'];
$phone    = $_POST['phone'];
$persons  = $_POST['persons'];
$checkin  = $_POST['checkin'];
$checkout = $_POST['checkout'];
$room     = $_POST['room'];
$rooms    = (int)$_POST['rooms'];

// GET PRICE
$q = mysqli_query($conn,"
SELECT price, available_rooms
FROM room_inventory
WHERE room_type='$room'
");
$data = mysqli_fetch_assoc($q);

// AVAILABILITY CHECK
if($data['available_rooms'] < $rooms){
    echo "<script>alert('Room Not Available');window.history.back();</script>";
    exit;
}

// PRICE CALCULATION
$base = $data['price'] * $rooms;
$gst  = ($base * 5) / 100;   // 12% GST
$total = $base + $gst;

// SAVE BOOKING (NO INVENTORY CHANGE HERE)
mysqli_query($conn,"
INSERT INTO bookings
(guest_name,email,phone,persons,checkin_date,checkout_date,
room_type,rooms,amount,status,payment_status)
VALUES
('$name','$email','$phone','$persons','$checkin','$checkout',
'$room','$rooms','$total','Pending','Unpaid')
");

$id = mysqli_insert_id($conn);

// GO TO PAYMENT
header("Location: payment.php?id=$id");
exit;
?>
