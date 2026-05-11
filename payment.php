```php
<?php
$conn = mysqli_connect("localhost","root","","hotel_booking");

if(!$conn){
    die("DB Connection Failed");
}

$id = (int)$_GET['id'];

$q = mysqli_query($conn,"
SELECT amount, guest_name, email, phone
FROM bookings
WHERE id=$id
");

$data = mysqli_fetch_assoc($q);

if(!$data){
    die("Invalid Booking");
}

$amount = $data['amount'] * 100; // in paise
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
</head>
<body>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
var options = {
    key: "YOUR_KEY_ID",

    amount: "<?= $amount ?>",

    currency: "INR",

    name: "Royal Hotel",

    description: "Room Booking Payment",

    image: "Images/logo.png",

    handler: function (response){

        window.location.href =
        "payment_success.php?id=<?= $id ?>&payment_id="
        + response.razorpay_payment_id;

    },

    prefill: {
        name: "<?= $data['guest_name'] ?>",
        email: "<?= $data['email'] ?>",
        contact: "<?= $data['phone'] ?>"
    },

    theme: {
        color: "#0f172a"
    }
};

var rzp1 = new Razorpay(options);
rzp1.open();
</script>

</body>
</html>
```