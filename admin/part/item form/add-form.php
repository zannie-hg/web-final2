<h1>Add A New Item</h1>

<div class="form-container">
    <form action="../php/add-item.php" method="post" enctype="multipart/form-data">
        <div class="split">
            <div class="image-area">
                <div class="image">
                    <img src="" alt="" id="newItemImage">
                </div>
                <label for="imageSelect">Select Item Image</label>
                <input type="file" accept="image/jpeg, image/png, image/jpg" value="Select Image" id="imageSelect"
                    name="imageSelect">
            </div>
            <div class="content-area">
                <div class="divide">
                    <label for="itemID">Item ID:</label>
                    <input type="text" name="itemID" id="itemID">
                    <label for="itemName">Item Name:</label>
                    <input type="text" name="itemName" id="itemName">
                    <label for="itemPrice">Item Price:</label>
                    <input type="text" name="itemPrice" id="itemPrice">
                    <label for="itemType">Item Type:</label>
                    <select name="itemType" id="itemType">
                        <option style="display: none;">- Select Item Type -</option>
                        <option value="desert">Desert</option>
                        <option value="main">Main</option>
                        <option value="drink">Drink</option>
                    </select>
                    <label for="trending">Trending:</label>
                    <select name="trending" id="trending">
                        <option style="display: none;">- Is trending? -</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <textarea name="description" id="description" name="description" placeholder="Item Description"></textarea>
            </div>
        </div>
        <input type="submit" value="Add New Item">
    </form>
</div>