<h1>Analytics</h1>

<div class="analyse">
    <div class="sales">
        <div class="status">
            <div class="info">
                <h3>Total Reservation</h3>
                <h1>
                    <?php
                    $stmt = "Select count(OrderID) as OrderNum from table_reservation_order where Status='accepted'";
                    $result = mysqli_query($con, $stmt);
                    $number = mysqli_fetch_assoc($result);
                    echo $number['OrderNum'];
                    ?>
                </h1>
            </div>
            <div class="progress">
                <svg>
                    <circle cx="38" cy="38" r="36"></circle>
                </svg>
                <div class="percentage">
                    <ion-icon name="clipboard"></ion-icon>
                </div>
            </div>
        </div>
    </div>
    <div class="visits">
        <div class="status">
            <div class="info">
                <h3>Total Customer Contact</h3>
                <h1>
                    <?php
                    $stmt = "Select count(QuestionID) as QuestionNum from customer_question";
                    $result = mysqli_query($con, $stmt);
                    $number = mysqli_fetch_assoc($result);
                    echo $number['QuestionNum'];
                    ?>
                </h1>
            </div>
            <div class="progress">
                <svg>
                    <circle cx="38" cy="38" r="36"></circle>
                </svg>
                <div class="percentage">
                    <ion-icon name="call"></ion-icon>
                </div>
            </div>
        </div>
    </div>
    <div class="searches">
        <div class="status">
            <div class="info">
                <h3>Average Star Review</h3>
                <h1>4,8</h1>
            </div>
            <div class="progress">
                <svg>
                    <circle cx="38" cy="38" r="36"></circle>
                </svg>
                <div class="percentage">
                    <ion-icon name="star"></ion-icon>
                </div>
            </div>
        </div>
    </div>
</div>