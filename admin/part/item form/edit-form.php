<h1>Edit Item Information</h1>

<div class="form-container">
    <?php
    if (!isset($_GET['ID'])) {
        header("Location: menu.php?Error=Item ID does not exist!");
        exit();
    } else {
        include("../php/config.php");

        $itemID = $_GET['ID'];
        $result = mysqli_query($con, "Select * from menu_item where ItemID='$itemID';");

        if (mysqli_num_rows($result) !== 1) {
            header("Location: menu.php?Error=Item ID does not match");
            exit();
        } else {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['FoodImage'] = $row['Image'];
        }
    }
    ?>

    <form action="../php/change-food-information.php" method="post" enctype="multipart/form-data">
        <div class="split">
            <div class="image-area">
                <div class="image">
                    <img src="../images/Food/<?php echo $row['Image']; ?>" alt="" id="newItemImage" name"newItemImage">
                </div>
                <label for="imageSelect">Select Item Image</label>
                <input type="file" accept="image/jpeg, image/png, image/jpg" value="Select Image" id="imageSelect" name="imageSelect">
            </div>
            <div class="content-area">
                <div class="divide">
                    <label for="itemID">Item ID:</label>
                    <input type="text" name="itemID" id="itemID" value="<?php echo $row['ItemID']; ?>">
                    <label for="itemName">Item Name:</label>
                    <input type="text" name="itemName" id="itemName" value="<?php echo $row['Name']; ?>">
                    <label for="itemPrice">Item Price:</label>
                    <input type="text" name="itemPrice" id="itemPrice" value="<?php echo $row['Price']; ?>">
                    <label for="itemType">Item Type:</label>
                    <select name="itemType" id="itemType">
                        <?php
                        switch ($row['Type']) {
                            case 'desert':
                                echo "<option value='desert' selected>Desert</option>
                                <option value='main'>Main</option>
                                <option value='drink'>Drink</option>";
                                break;
                            case 'main':
                                echo "<option value='desert'>Desert</option>
                                <option value='main' selected>Main</option>
                                <option value='drink'>Drink</option>";
                                break;
                            case 'drink':
                                echo "<option value='desert'>Desert</option>
                                <option value='main'>Main</option>
                                <option value='drink' selected>Drink</option>";
                                break;
                        }
                        ?>
                    </select>
                    <label for="trending">Trending:</label>
                    <select name="trending" id="trending">
                        <?php
                        switch ($row['Trending']) {
                            case 'yes':
                                echo "<option value='yes' selected>Yes</option>
                                <option value='no'>No</option>";
                                break;
                            case 'no':
                                echo "<option value='yes'>Yes</option>
                                <option value='no' selected>No</option>";
                                break;
                        }
                        ?>
                    </select>
                </div>
                <textarea name="description" id="description" placeholder="Item Description"><?php echo $row['Description']; ?></textarea>
            </div>
        </div>
        <input type="submit" value="Update Item">
    </form>
</div>