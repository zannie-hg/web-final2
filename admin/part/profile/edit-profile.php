<h1>Edit Profile Information</h1>

<div class="form-container">
    <form action="../php/change-admin-profile.php" method="post" enctype="multipart/form-data">
        <div class="split">
            <div class="image-area">
                <div class="image">
                    <img src="../images/Admin/<?php echo $_SESSION['ProfileImage'] ?>" alt="" id="newItemImage">
                </div>
                <label for="imageSelect">Select Profile Image</label>
                <input type="file" accept=".jpeg, .png, .jpg" value="Select Image" id="imageSelect" name="imageSelect">
            </div>
            <div class="content-area">
                <div class="divide">
                    <label for="accountID">Account ID:</label>
                    <input type="text" name="accountID" id="accountID" disabled value="<?php echo $_SESSION['AccountID'] ?>">
                    <label for="fullname">Full Name:</label>
                    <input type="text" name="fullname" id="fullname" value="<?php echo $_SESSION['FullName'] ?>">
                    <label for="phone">Phone Number:</label>
                    <input type="text" name="phone" id="phone" value="<?php echo $_SESSION['Phone'] ?>">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="<?php echo $_SESSION['Email'] ?>">
                    <label for="birthday">Birthday:<br>(MM/DD/YYYY)</label>
                    <input type="date" name="birthday" id="birthday" value="<?php echo $_SESSION['Birthday'] ?>">
                </div>
                <?php
                if (isset($_GET['Message'])) {
                    echo "<p style='color: #FF0060'>" . $_GET['Message'] . "</p>";
                }
                ?>
            </div>
        </div>
        <input type="submit" value="Update Profile">
    </form>
</div>