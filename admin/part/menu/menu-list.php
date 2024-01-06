<div class="menu-container">
    <?php
    include("../php/config.php");

    $result = mysqli_query($con, "Select * from menu_item order by Price asc;");
    $item_list = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $item_list[] = $row;
    }

    foreach ($item_list as $item) {
    ?>
        <div class="item <?php echo  $item['Type']; ?>" id="<?php echo  $item['ItemID']; ?>">
            <div class="image">
                <img src="../images/Food/<?php echo  $item['Image']; ?>" alt="">
            </div>
            <div class="content">
                <div class="name-price">
                    <h1><?php echo  $item['Name']; ?></h1>
                    <h1><?php echo  $item['Price']; ?>$</h1>
                </div>
                <div class="description">
                    <p><?php echo  $item['Description']; ?></p>
                </div>
            </div>
            <div class="item-control">
                <?php $itemID = $item['ItemID'] ?>
                <a href="<?php echo "editItem.php?ID=$itemID"?>"><ion-icon name="pencil"></ion-icon></a>
                <a href="<?php echo "../php/delete-item.php?ID=$itemID"?>"><ion-icon name="trash"></ion-icon></a>
            </div>
        </div>
    <?php } ?>

    <div class="next-previous">
        <button class="previous"><ion-icon name="caret-back"></ion-icon></button>
        <button class="next"><ion-icon name="caret-forward"></ion-icon></button>
    </div>
</div>