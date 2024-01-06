<section class="contact">
    <div class="left">
        <h1>Contact Information</h1>
        <p>
            For inquiries, reach out to us at Mint House Restaurant through our contact information provided below or through our contact form, and our dedicated team will assist you in making your dining experience truly exceptional.
        </p>
        <div class="leftchil">
            <ion-icon name="location-outline"></ion-icon>
            <p>147 Ngũ Hành Sơn, Đà Nẵng</p>
        </div>
        <hr />
        <div class="leftchil">
            <ion-icon name="call-outline"></ion-icon>
            <p>0242 242 0777</p>
        </div>
        <hr />
        <div class="leftchil">
            <ion-icon name="mail-outline"></ion-icon>
            <p>info@vku.udn.vn</p>
        </div>
    </div>

    <div class="right">
        <h1>Email us your question</h1>
        <form action="php/contact-form-submit.php" method="post">
            <div class="in">
                <input type="text" placeholder="Your Name" id="customerName" name="customerName" required />
                <input type="text" placeholder="Phone Number" id="customerPhone" name="customerPhone" required />
            </div>
            <input type="text" placeholder="Your Email" id="customerEmail" name="customerEmail" required />
            <textarea cols="30" rows="10" placeholder="Message" id="customerQuestion" name="customerQuestion" required></textarea>
            <div class="in">
                <button class="btn" type="submit">Submit</button>
                <?php
                if (isset($_GET['Message'])) {
                    if ($_GET['Message'] === 'Submit Question Successful!') {
                        echo "<p style='color: #0ca883'>" . $_GET['Message'] . "</p>";
                    } else {
                        echo "<p style='color: #FF0060>" . $_GET['Message'] . "</p>";
                    }
                }
                ?>
            </div>
        </form>
    </div>
</section>