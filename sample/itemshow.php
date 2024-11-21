<!DOCTYPE html>
<html>
<head>
    <title>Items</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        td {
            color: #555;
        }

        .no-results {
            text-align: center;
            padding: 20px;
            font-size: 1.2em;
            color: #666;
        }

        .add-to-cart {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 4px;
            text-transform: uppercase;
        }

        .add-to-cart:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Items in Database</h1>
    <table>
        <tr>
            <th>Item ID</th>
            <th>Item Name</th>
            <th>Item Description</th>
            <th>Item Price</th>
            <th>Action</th>
        </tr>
        <?php
    
include_once "db_connect.php";

        // SQL query
        $sql = "SELECT item_id, item_name, item_desc, item_price FROM items";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output each row of the table
            while ($row = $result->fetch_assoc()) { ?>
               <tr>
                <td> <?php echo $row["item_id"]   ; ?></td>
                <td> <?php echo $row["item_name"] ; ?></td>
                <td> <?php echo $row["item_desc"] ; ?></td>
                <td> <?php echo $row["item_price"]; ?></td>
                <td> <a class='add-to-cart' href='add_to_cart.php?addTocart&itemId=<?php echo $row["item_id"];?>' > add to cart</a> </td>
                </tr>
            <?php }
        } else {
            echo "<tr><td colspan='5' class='no-results'>No results found</td></tr>";
        }

        // Close the connection
        $conn->close();
        ?>
    </table>
</body>
</html>


