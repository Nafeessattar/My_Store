<?php
include 'config.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];

    // File upload handling
    $targetDir = "images/";  // Specify the target directory where you want to store images
    $targetFile = $targetDir . basename($_FILES["img"]["name"]);

    if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile)) {
        // Image was uploaded successfully
        $img = $targetFile;

        $sql = "INSERT INTO products (name, price, img) VALUES ('$name', '$price', '$img')";
        
        if (mysqli_query($conn, $sql)) {
            echo "Data stored successfully";
        } else {
            echo "Error storing data: " . mysqli_error($conn);
        }
    } else {
        echo "Error uploading the file.";
    }

    mysqli_close($conn);
}
?>
<style>
    button{
        float: right;
        cursor: pointer;
        font-size: larger;
        border-radius: 1rem;
    }
    form{
        font-size: x-large;
    }
    .submit{
        font-size: large;
        cursor: pointer;
    }
</style>
<div class="btn">
<a href="logout.php"><button>Logout</button></a>
</div>
<div class="form">
<form action="./productform.php" method="POST" enctype="multipart/form-data">
  <label for="name">Product Name:</label><br>
  <input type="text" id="name" name="name"><br>
  <label for="price">Product Price:</label><br>
  <input type="text" id="price" name="price"><br>
  <label for="img">Product Image:</label><br>
  <input type="file" id="img" name="img"><br><br>
  <input type="submit" class="submit" value="submit" name="submit">
</form> 
</div>
<?php
include 'session.php';

?>