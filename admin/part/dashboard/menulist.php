<div class="menu">
    <h2>Menu List</h2>
    <div class="menu-list">
    <?php
        include("../php/config.php");

        $stmt = "Select * from menu_item order by ItemID asc limit 3";
        $result = mysqli_query($con, $stmt);

        $item_list = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $item_list[] = $row;
        }

        foreach ($item_list as $item) {
            $id = $item['ItemID'];
        ?>
            <a href=<?php echo "editItem.php?ID=$id" ?> class="item" id="<?php echo $item['ItemID'] ?>">
                <img src="../images/Food/<?php echo $item['Image'] ?>" alt="">
                <h2><?php echo $item['Name'] ?></h2>
            </a>
        <?php } ?>
        <a href="../admin/menu.php" class="item">
            <ion-icon name="grid"></ion-icon>
            <h2>Show all</h2>
        </a>
    </div>
</div>