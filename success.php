<?php
$conn = mysqli_connect("localhost","root","","hotel_booking");
$id = $_GET['id'];

mysqli_query($conn,"
UPDATE bookings 
SET payment_status='Paid', status='Confirmed'
WHERE id=$id
");

echo "<script>
alert('Payment Successful!');
window.location='index.html';
</script>";
?>
