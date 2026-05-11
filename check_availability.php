<?php
$conn = mysqli_connect("localhost","root","","hotel_booking");
if(!$conn) die("DB Error");

$room = $_POST['room'];

$q = mysqli_query($conn,"
SELECT available_rooms 
FROM room_inventory 
WHERE room_type='$room'
");

if(mysqli_num_rows($q)==0){
    echo "FULL";
    exit;
}

$d = mysqli_fetch_assoc($q);

if($d['available_rooms'] > 0){
    echo "AVAILABLE";
} else {
    echo "FULL";
}
