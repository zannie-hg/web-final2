<div class="recent-orders">
    <h2>Recent Reservation Orders</h2>
    <table>
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Reservation Date(YYYY/MM/DD)</th>
                <th>Reservation Time</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("../php/config.php");

            $result = mysqli_query($con, "Select * from table_reservation_order order by OrderID desc limit 3;");
            $item_list = [];

            while ($row = mysqli_fetch_assoc($result)) {
                $item_list[] = $row;
            }

            foreach ($item_list as $item) {
            ?>
                <tr>
                    <td><?php echo $item['FullName'] ?></td>
                    <td><?php echo $item['Date'] ?></td>
                    <td>
                        <?php
                        $time = $item['Time'];
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
                        ?>
                    </td>
                    <?php
                    $status = $item['Status'];
                    $id = $item['OrderID'];
                    switch ($status) {
                        case 'pending':
                            echo "<td class='warning'>$status</td>";
                            break;
                        case 'accepted':
                            echo "<td class='success'>$status</td>";
                            break;
                        case 'declined':
                            echo "<td class='danger'>$status</td>";
                            break;
                    }
                    ?>
                    <td class="primary"><a href=<?php echo "view-reservation.php?ID=$id" ?>>Details</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="reservation.php">Show All</a>
</div>