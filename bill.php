<?php
// bill.php — generate & display the customer bill
include 'config.php';

if (!isset($_GET['order_id'])) {
    die("No order specified.");
}

$order_id = (int) $_GET['order_id'];

// fetch order header
$res_order = mysqli_query($conn,
    "SELECT * FROM orders WHERE order_id = $order_id"
) or die(mysqli_error($conn));
$order = mysqli_fetch_assoc($res_order);

// fetch order items
$res_items = mysqli_query($conn,
    "SELECT * FROM order_items WHERE order_id = $order_id"
) or die(mysqli_error($conn));

$total = 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bill for Order #<?php echo $order_id; ?></title>
</head>
<body>
    <h2>Bill — Order #<?php echo $order_id; ?></h2>
    Customer: <?php echo htmlspecialchars($order['cust_name']); ?><br>
    Table No: <?php echo $order['table_no']; ?><br>
    Date:     <?php echo $order['order_date']; ?><br><br>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Item</th><th>Qty</th><th>Price</th><th>Subtotal</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($res_items)): 
            $subtotal = $row['quantity'] * $row['price'];
            $total   += $subtotal;
        ?>
        <tr>
            <td><?php echo htmlspecialchars($row['item_name']); ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo number_format($row['price'], 2); ?></td>
            <td><?php echo number_format($subtotal, 2); ?></td>
        </tr>
        <?php endwhile; ?>
        <tr>
            <td colspan="3" align="right"><strong>Total</strong></td>
            <td><strong><?php echo number_format($total, 2); ?></strong></td>
        </tr>
    </table>
</body>
</html>
<?php mysqli_close($conn); ?>
