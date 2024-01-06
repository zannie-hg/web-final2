<?php
include("php/config.php");

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];

    $stmt = "Select * from menu_item where ItemID='$id'";
    $result = mysqli_query($con, $stmt);
    $row = mysqli_fetch_assoc($result);
}
?>

<section class="product-detail">
    <div class="image-side">
        <div class="main-image">
            <img id="main-image" src="images/Food/<?php echo $row['Image']; ?>" alt="main-image">
        </div>
    </div>

    <div class="content">
        <h3><?php echo $row['Name']; ?></h3>
        <p class="price" name="price" id="price"><?php echo $row['Price']; ?>$</p>
        <p class="detail-heading">Description:</p>
        <p class="detail">
            <?php echo $row['Description']; ?>
        </p>
    </div>
</section>