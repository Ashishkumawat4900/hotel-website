<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include "../db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body { font-family: Arial; }
        table { border-collapse: collapse; width: 100%; }
        th, td { padding: 10px; border: 1px solid #000; text-align: center; }
        th { background: #eee; }
        a { text-decoration: none; }
    </style>
</head>
<body>

<h2>Hotel Bookings</h2>
<a href="logout.php">Logout</a>
<br><br>

<table>
   <tr>
    <th>ID</th>
    <th>Guest Name</th>
    <th>Check-in Date</th>
    <th>Room Type</th>
    <th>Booking Status</th>
    <th>Payment</th>
    <th>Action</th>
</tr>


<?php
$result = mysqli_query($conn, "SELECT * FROM bookings ORDER BY id DESC");

while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td><?= $row['id']; ?></td>
    <td><?= $row['guest_name']; ?></td>
    <td><?= $row['checkin_date']; ?></td>
    <td><?= $row['room_type']; ?></td>
    <td><?= $row['status']; ?></td>
    <td><?= $row['payment_status']; ?></td>
    <td>
        <a href="confirm.php?id=<?= $row['id']; ?>">Confirm</a> |
        <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Delete booking?')">Delete</a>
    </td>
</tr>

<?php } ?>

</table>

</body>
</html>
