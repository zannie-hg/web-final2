<section class="trending-now">
    <h1>Most Popular Dishes</h1>

    <p>Take a look at these popular dishes that our customers often choose!</p>

    <div class="container-menu">
        <?php
        $result = mysqli_query($con, "Select * from menu_item where Trending = 'yes';");
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

            <h1>Drink</h1>

            <?php
            foreach ($item_list as $item) {
                if ($item["Type"] === "drink") {
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
</section>