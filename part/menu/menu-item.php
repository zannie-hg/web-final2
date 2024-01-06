<section class="menu">
    <h1>Enjoy our delicious dishes</h1>

    <p>Eat and enjoy Vietnamese traditional food!</p>

    <div class="container-menu">
        <?php
        $result = mysqli_query($con, "Select * from menu_item;");
        $item_list = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $item_list[] = $row;
        }
        ?>
        <div class="category">

            <h1>Desert</h1>

            <?php
            foreach ($item_list as $item) {
                if ($item["Type"] === "desert") {
                    $id = $item['ItemID'];
            ?>
                    <a href="<?php echo "view-item.php?ID=$id" ?>" class="menu-item <?php echo $item["Type"] ?>" id="<?php echo $item["ItemID"] ?>">
                        <img src="images/Food/<?php echo $item["Image"]?>" alt="" />
                        <div class="content-item">
                            <div class="name-price">
                                <h4><?php echo $item["Name"] ?></h4>
                                <p>$<?php echo $item["Price"] ?></p>
                            </div>
                            <div class="description">
                                <p><?php echo $item["Description"] ?></p>
                            </div>
                        </div>
                    </a>
            <?php }
            } ?>
        </div>

        <div class="category">

            <h1>Main</h1>

            <?php
            foreach ($item_list as $item) {
                if ($item["Type"] === "main") {
            ?>
                    <div class="menu-item <?php echo $item["Type"] ?>" id="<?php echo $item["ItemID"] ?>">
                        <img src="images/Food/<?php echo $item["Image"]?>" alt="" />
                        <div class="content-item">
                            <div class="name-price">
                                <h4><?php echo $item["Name"] ?></h4>
                                <p>$<?php echo $item["Price"] ?></p>
                            </div>
                            <div class="description">
                                <p><?php echo $item["Description"] ?></p>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>

        <div class="category">

            <h1>Drink</h1>

            <?php
            foreach ($item_list as $item) {
                if ($item["Type"] === "drink") {
            ?>
                    <div class="menu-item <?php echo $item["Type"] ?>" id="<?php echo $item["ItemID"] ?>">
                        <img src="images/Food/<?php echo $item["Image"]?>" alt="" />
                        <div class="content-item">
                            <div class="name-price">
                                <h4><?php echo $item["Name"] ?></h4>
                                <p>$<?php echo $item["Price"] ?></p>
                            </div>
                            <div class="description">
                                <p><?php echo $item["Description"] ?></p>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>

    <div class="load-more">
        <ion-icon name="arrow-back-circle-outline" class="previous-btn"></ion-icon>
        <ion-icon name="arrow-forward-circle-outline" class="next-btn"></ion-icon>
    </div>
</section>