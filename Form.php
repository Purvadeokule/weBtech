<?php
// Form.php — booking form
?>
<!DOCTYPE html>
<html>
<head>
    <title>Restaurant Order Booking</title>
</head>
<body>
    <h2>Place Your Order</h2>
    <form method="post" action="database_handling.php">
        Customer Name: <input type="text" name="cust_name" required><br><br>
        Table Number:  <input type="number" name="table_no" required><br><br>

        <!--
          You can add more rows dynamically with JavaScript,
          but here we provide three item‐rows for simplicity
        -->
        <div id="items">
            <div>
                Item: <input type="text" name="item[]" required>
                Qty:  <input type="number" name="qty[]" min="1" required>
                Price:<input type="number" step="0.01" name="price[]" required>
            </div><br>
            <div>
                Item: <input type="text" name="item[]" required>
                Qty:  <input type="number" name="qty[]" min="1" required>
                Price:<input type="number" step="0.01" name="price[]" required>
            </div><br>
            <div>
                Item: <input type="text" name="item[]" required>
                Qty:  <input type="number" name="qty[]" min="1" required>
                Price:<input type="number" step="0.01" name="price[]" required>
            </div><br>
        </div>

        <input type="submit" value="Place Order">
    </form>
</body>
</html>
