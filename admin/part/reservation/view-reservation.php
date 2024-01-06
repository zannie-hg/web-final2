<h1>Edit Item Information</h1>

<div class="question-container">
    <form action="../php/accept-decline.php?ID=<?php echo $_GET['ID']; ?>" method="post">
        <?php
        if (!isset($_GET['ID'])) {
            header("Location: menu.php?Error=Item ID does not exist!");
            exit();
        } else {
            include("../php/config.php");

            $itemID = $_GET['ID'];
            $result = mysqli_query($con, "Select * from table_reservation_order where OrderID='$itemID';");

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
                <label for="questionID">Reservation Order ID:</label>
                <input type="text" name="questionID" id="questionID" disabled value="<?php echo $row['OrderID']; ?>">
                <label for="fullname">Customer Name:</label>
                <input type="text" name="fullname" id="fullname" disabled value="<?php echo $row['FullName']; ?>">
                <label for="phone">Phone Number:</label>
                <input type="text" name="phone" id="phone" disabled value="<?php echo $row['Phone']; ?>">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" disabled value="<?php echo $row['Email']; ?>">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" disabled value="<?php echo $row['Date']; ?>">
                <label for="time">Time</label>
                <input type="text" name="time" id="time" disabled value="<?php
                                                                            $time = $row['Time'];
                                                                            switch ($time) {
                                                                                case 1:
                                                                                    echo "09:00 AM - 11:30 AM";
                                                                                    break;
                                                                                case 2:
                                                                                    echo "13:00 PM - 15:30 PM";
                                                                                    break;
                                                                                case 3:
                                                                                    echo "15:30 PM - 18:00 PM";
                                                                                    break;
                                                                                case 4:
                                                                                    echo "18:00 PM - 20:30 PM";
                                                                                    break;
                                                                                case 5:
                                                                                    echo "20:30 PM - 23:00 PM";
                                                                                    break;
                                                                            }
                                                                            ?>">
                <label for="message">Customer Request:</label>
            </div>
            <textarea name="message" id="message" disabled placeholder="Customer Special Request"><?php echo $row['SpecialRequest']; ?></textarea>
            <div class="control">
                <input type="submit" id="accept" name="accept" value="Accept Order">
                <input type="submit" id="decline" name="decline" value="Decline Order">
            </div>
        </div>
    </form>
</div>