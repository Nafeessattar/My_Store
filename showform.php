<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Table</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
        <?php
        include("config.php");
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);
            // Populate the table with data from the database
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["price"] . "</td>";
                    // Display the image using an <img> tag
                    echo "<td><img src='" . $row["img"] . "' alt='Product Image' width='100'></td>";
                    echo "</tr>";
                }
            } else {
                echo "No data available";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
