<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

$query = "
    SELECT item.name, item.price, order.quantity 
    FROM order 
    JOIN item ON order.item_id = item.id 
    WHERE order.user_id = $user_id
";
$result = mysqli_query($conn, $query);
?>

<h1>Your Cart</h1>
<table border="1">
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
    </tr>
    <?php 
    $grand_total = 0;
    while ($cart_item = mysqli_fetch_assoc($result)): 
        $total = $cart_item['price'] * $cart_item['quantity'];
        $grand_total += $total;
    ?>
        <tr>
            <td><?php echo $cart_item['name']; ?></td>
            <td><?php echo $cart_item['price']; ?></td>
            <td><?php echo $cart_item['quantity']; ?></td>
            <td><?php echo $total; ?></td>
        </tr>
    <?php endwhile; ?>
    <tr>
        <td colspan="3">Grand Total</td>
        <td><?php echo $grand_total; ?></td>
    </tr>
</table>

<a href="items.php">Back to Items</a>