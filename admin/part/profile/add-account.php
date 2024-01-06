<h1>Add New Account</h1>

<div class="form-container">
    <form action="../php/add-account.php" method="post" enctype="multipart/form-data">
        <div class="split">
            <div class="image-area">
                <div class="image">
                    <img src="" alt="" id="newItemImage" name="newItemImage">
                </div>
                <label for="imageSelect">Select Profile Image</label>
                <input type="file" accept="image/jpeg, image/png, image/jpg" value="Select Image" id="imageSelect" name="imageSelect">
            </div>
            <div class="content-area">
                <div class="divide">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" placeholder="New Username">
                    <label for="password">Password:</label>
                    <input type="text" name="password" id="password" placeholder="New Password">
                    <label for="fullname">Full Name:</label>
                    <input type="text" name="fullname" id="fullname" placeholder="Full name">
                    <label for="phone">Phone Number:</label>
                    <input type="text" name="phone" id="phone" placeholder="Phone Number">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Email">
                    <label for="birthday">Birthday:</label>
                    <input type="date" name="birthday" id="birthday">
                </div>
                <?php
                if (isset($_GET['Message'])) {
                    echo "<p style='color: #FF0060'>" . $_GET['Message'] . "</p>";
                }
                ?>
            </div>
        </div>
        <input type="submit" value="Add New Account">
    </form>
</div>