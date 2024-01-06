<div class="recent-orders">
    <table>
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("../php/config.php");

            $result = mysqli_query($con, "Select * from customer_question order by QuestionID desc;");
            $item_list = [];

            while ($row = mysqli_fetch_assoc($result)) {
                $item_list[] = $row;
            }

            foreach ($item_list as $item) {
            ?>
                <tr class="question <?php echo $item['Status'] ?>">
                    <td><?php echo $item['FullName'] ?></td>
                    <td><?php echo $item['Phone'] ?></td>
                    <td><?php echo $item['Email'] ?></td>
                    <?php
                    $status = $item['Status'];
                    $id = $item['QuestionID'];
                    switch ($status) {
                        case 'pending':
                            echo "<td class='warning'>Pending</td>";
                            break;
                        case 'checked':
                            echo "<td class='success'>Checked</td>";
                            break;
                    }
                    ?>
                    <td class="primary"><a href=<?php echo "view-question.php?ID=$id" ?>>Details</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>