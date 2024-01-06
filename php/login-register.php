<?php
include("config.php");

session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    if (!empty($username) && !empty($password)) {
        $stmt = "Select * from admin_account where Username = '$username' and Password = '$password';";
        $result = mysqli_query($con, $stmt);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['AccountID'] = $row['AdminID'];
            $_SESSION['FullName'] = $row['FullName'];
            $_SESSION['Phone'] = $row['Phone'];
            $_SESSION['Email'] = $row['Email'];
            $_SESSION['Birthday'] = $row['Birthday'];
            $_SESSION['Username'] = $row['Username'];
            $_SESSION['ProfileImage'] = $row['ProfileImage'];
            header("Location: ../admin/dashboard.php");
        } else {
            header("Location: ../admin/index.php?error=Incorrect Username or Password!");
        }
    } else {
        header("Location: ../admin/index.php?error=Incorrect Username or Password!");
    }
} else {
    header("Location: ../admin/index.php");
}
