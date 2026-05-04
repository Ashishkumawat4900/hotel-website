<?php
include "db.php";

$room = $_POST['room'];

$q = mysqli_query($conn,
  "SELECT price FROM room_inventory WHERE room_type='$room'"
);

$row = mysqli_fetch_assoc($q);
echo $row['price'];
