<h1>Your Profile</h1>

<div class="form-container">
    <form action="" method="post">
        <div class="split">
            <div class="image-area">
                <div class="image">
                    <img src="../images/Admin/<?php echo $_SESSION['ProfileImage'] ?>" alt="" id="newItemImage">
                </div>
            </div>
            <div class="content-area">
                <div class="divide">
                    <label for="accountID">Account ID:</label>
                    <input type="text" name="accountID" id="accountID" disabled value="<?php echo $_SESSION['AccountID'] ?>">
                    <label for="fullname">Full Name:</label>
                    <input type="text" name="fullname" id="fullname" disabled value="<?php echo $_SESSION['FullName'] ?>">
                    <label for="phone">Phone Number:</label>
                    <input type="text" name="phone" id="phone" disabled value="<?php echo $_SESSION['Phone'] ?>">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" disabled value="<?php echo $_SESSION['Email'] ?>">
                    <label for="birthday">Birthday:<br>(MM/DD/YYYY)</label>
                    <input type="date" name="birthday" id="birthday" disabled value="<?php echo $_SESSION['Birthday'] ?>">
                </div>
            </div>
        </div>
        <a href="editProfile.php">Edit Profile Information</a>
    </form>
</div>