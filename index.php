<!DOCTYPE html>
<html lang="en">

<?php
    include("classes/Item.php");
    include("classes/Book.php");
    include("classes/Dvd.php");
    include("classes/Furniture.php");
    include("dbConnect.php");

    $dbConnect = new DbConnect();
    $conn = $dbConnect->connect();

    //Feeding the data from add product form to the database
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $sku = $_POST['sku'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $weight = (!empty($_POST['weight'])) ? $_POST['weight'] : 0;
        $size = (!empty($_POST['size'])) ? $_POST['size'] : 0;
        $height = (!empty($_POST['height'])) ? $_POST['height'] : 0;
        $width = (!empty($_POST['width'])) ? $_POST['width'] : 0;
        $length = (!empty($_POST['length'])) ? $_POST['length'] : 0;
        $sql = $sql = "INSERT INTO `products` (`sku`, `name`, `price`, `size`, 
            `weight`, `height`, `width`, `length`) 
        VALUES ('$sku', '$name', '$price', '$size', '$weight', '$height', '$width', '$length')";

        if(!$conn -> query($sql)){
            echo "ECHO: $sql <br> $conn->error";
        }
    }

    //Deleting selected items
    if(isset($_GET['delete']))
    {
        $delete = $_GET['delete'];
        $deleteArray = explode(',',$delete);
        forEach($deleteArray as $deleteNumber){
            $sql = "DELETE FROM `products` WHERE `sku` = '$deleteNumber'";
            mysqli_query($conn, $sql);
        }
    }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="productList.css">
</head>

<body>
    <script src="js/jquery-3.6.0.js"></script>

    <header>
        <p class="heading">Product List</p>
        <button id="add-product-btn">ADD</button>
        <button id="delete-product-btn">MASS DELETE</button>
    </header>
    <hr>
    <div class="container">
<?php

    //Fetching data from the database
    $sql = "SELECT * FROM `products` WHERE `size` != 0";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $item = new Dvd($row['sku'], $row['name'], $row['price'], $row['size']);
        echo "<div class='item'>
            <input class= 'delete-checkbox' type='checkbox'>
            <p class='sku'>" .$item->getSku(). "<p>
            <p>" .$item->getName(). "<p>
            <p>" .$item->getPrice(). " $<p>
            <p>" .$item->getAttributes(). "<p> </div>";
    }

    $sql = "SELECT * FROM `products` WHERE `weight` != 0";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $item = new Book($row['sku'], $row['name'], $row['price'], $row['weight']);
        echo "<div class='item'>
            <input class= 'delete-checkbox' type='checkbox'>
            <p class='sku'>" .$item->getSku(). "<p>
            <p>" .$item->getName(). "<p>
            <p>" .$item->getPrice(). " $<p>
            <p>" .$item->getAttributes(). "<p> </div>";
    }

    $sql = "SELECT * FROM `products` WHERE `height` != 0";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $item = new Furniture($row['sku'], $row['name'], $row['price'],
             $row['height'], $row['width'], $row['length']);
        echo "<div class='item'>
            <input class= 'delete-checkbox' type='checkbox'>
            <p class='sku'>" .$item->getSku(). "<p>
            <p>" .$item->getName(). "<p>
            <p>" .$item->getPrice(). " $<p>
            <p>" .$item->getAttributes(). "<p> </div>";
    }
?>
    </div>

<script>
    //script for add and delete button functionality
    $("#add-product-btn").click(function () {
        location.href = "AddProduct.html";
    })

    var deleteArray = [];

    //when an element is checked, the following code returns the sku property corresponding to that element
    $('#delete-product-btn').click(function () {
        checkBoxes = document.getElementsByClassName('delete-checkbox');
        Array.from(checkBoxes).forEach((element) => {
            if (element.checked) {
                parent = element.closest('div');
                skus = $(parent).children('p.sku');
                Array.from(skus).forEach((element) => {
                    deleteSku = element.innerText;
                    deleteArray.push(deleteSku);
                })
            }
        })
        var src = "index.php?delete=" + deleteArray;
        window.location.href = src;
    });
</script>
</body>
<hr>
<footer>
    <p class="footer">Scandiweb Test Assignment</p>
</footer>

</html>