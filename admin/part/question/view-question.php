<h1>Edit Item Information</h1>

<div class="question-container">
    <?php
    if (!isset($_GET['ID'])) {
        header("Location: menu.php?Error=Item ID does not exist!");
        exit();
    } else {
        include("../php/config.php");

        $itemID = $_GET['ID'];
        $result = mysqli_query($con, "Select * from customer_question where QuestionID='$itemID';");

        $stmt = "Update customer_question set Status='checked' where QuestionID='$itemID';";
        mysqli_query($con, $stmt);

        if (mysqli_num_rows($result) !== 1) {
            header("Location: menu.php?Error=Item ID does not match");
            exit();
        } else {
            $row = mysqli_fetch_assoc($result);
        }
    }
    ?>

    <div class="content-area">
        <div class="divide">
            <label for="questionID">Question ID:</label>
            <input type="text" name="questionID" id="questionID" disabled value="<?php echo $row['QuestionID']; ?>">
            <label for="fullname">Customer Name:</label>
            <input type="text" name="fullname" id="fullname" disabled value="<?php echo $row['FullName']; ?>">
            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" id="phone" disabled value="<?php echo $row['Phone']; ?>">
            <label for="itemType">Email</label>
            <input type="email" name="email" id="email" disabled value="<?php echo $row['Email']; ?>">
            <label for="message">Question:</label>
        </div>
        <textarea name="message" id="message" disabled placeholder="Customer Question"><?php echo $row['Message']; ?></textarea>
    </div>
</div>