<section class="book-table">
    <div class="container">
        <div class="image">
            <img src="https://hiddenhoian.com/wp-content/uploads/2019/09/ThirtySeven-6108.jpg" alt="">
            <div class="backbox"></div>
        </div>
        <div class="book-form">
            <h1>Book a table online</h1>
            <form action="php/book-table-submit.php" method="post">
                <div class="input">
                    <input type="text" id="name" name="name" placeholder="Your Name" required autocomplete="off">
                    <input type="email" id="email" name="email" placeholder="Your Email" required autocomplete="off">
                    <input type="text" id="phone" name="phone" placeholder="Your Phone Number" required autocomplete="off">
                    <select id="numPeople" name="numPeople" required>
                        <option style="display: none;">Number Of People</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="4">4</option>
                    </select>
                    <input type="date" id="date" name="date" required>
                    <select id="time" name="time" required>
                        <option style="display: none;">Time</option>
                        <option value="1">09:00 AM - 11:30 AM</option>
                        <option value="2">13:00 PM - 15:30 PM</option>
                        <option value="3">15:30 PM - 18:00 PM</option>
                        <option value="4">18:00 PM - 20:30 PM</option>
                        <option value="5">20:30 PM - 23:00 PM</option>
                    </select>
                </div>
                <textarea name="request" id="request" name="request" placeholder="Special Request"></textarea>
                <div class="in">
                    <button class="btn" type="submit">Book now</button>
                    <?php
                    if (isset($_GET['Message'])) {
                        if ($_GET['Message'] === 'Submit Reservation Order Successful!') {
                            echo "<p style='color: #FFF'>".$_GET['Message']."</p>";
                        } else if ($_GET['Message'] === 'Submit Reservation Order Unsuccessful!') {
                            echo "<p style='color: #FF0060>".$_GET['Message']."</p>";
                        }
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
</section>