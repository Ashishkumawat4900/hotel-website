<?php
$conn = mysqli_connect("localhost","root","","hotel_booking");
$id = (int)$_GET['id'];

$q = mysqli_query($conn,"SELECT amount FROM bookings WHERE id=$id");
$data = mysqli_fetch_assoc($q);

$amount = $data['amount'] * 100; // Razorpay uses paise
?>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    key: "rzp_test_1DP5mmOlF5G5ag",
    amount: <?= $amount ?>,
    currency: "INR",
    name: "Royal Hotel",
    description: "Room Booking (GST Included)",
    handler: function () {
        window.location.href = "payment_success.php?id=<?= $id ?>";
    }
};
new Razorpay(options).open();
</script>
