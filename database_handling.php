<?php
// database_handling.php — handle form submission
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // sanitize inputs
    $cust_name = mysqli_real_escape_string($conn, $_POST['cust_name']);
    $table_no  = (int) $_POST['table_no'];

    // 1) insert into orders
    $sql  = "INSERT INTO orders (cust_name, table_no) 
             VALUES ('$cust_name', $table_no)";
    if (!mysqli_query($conn, $sql)) {
        die("Error inserting order: " . mysqli_error($conn));
    }
    $order_id = mysqli_insert_id($conn);

    // 2) insert each item
    foreach ($_POST['item'] as $i => $itm) {
        $item_name = mysqli_real_escape_string($conn, $itm);
        $qty       = (int) $_POST['qty'][$i];
        $price     = (float) $_POST['price'][$i];

        $sql_item = "INSERT INTO order_items 
                     (order_id, item_name, quantity, price)
                     VALUES ($order_id, '$item_name', $qty, $price)";
        mysqli_query($conn, $sql_item)
            or die("Error inserting item: " . mysqli_error($conn));
    }

    // redirect to bill page
    header("Location: bill.php?order_id=$order_id");
    exit();
}
?>
