<?php
include("config.php");

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['fullname']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['birthday'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $birthday = validate($_POST['birthday']);
    $fullname = validate($_POST['fullname']);
    $oldImage = validate($_SESSION['ProfileImage']);

    if ($_FILES['imageSelect']['error'] === 4 && empty($oldImage)) {
        $Message = "Please select your image!";
        header("Location: ../admin/editProfile.php?Message=$Message");
        exit();
    } else {
        if ($_FILES['imageSelect']['error'] !== 4) {
            $fileName = $_FILES['imageSelect']['name'];
            $fileSize = $_FILES['imageSelect']['size'];
            $tmpName = $_FILES['imageSelect']['tmp_name'];
        } else {
            $fileName = $oldImage;
            $fileSize = 1;
            $tmpName = "../images/Admin";
        }

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));

        if (!in_array($imageExtension, $validImageExtension)) {
            $Message = "Invalid image extension!";
            print_r($imageExtension);
            header("Location: ../admin/editProfile.php?Message=$Message");
            exit();
        } else if ($fileSize > 10000000) {
            $Message = "Image size is too large!";
            header("Location: ../admin/editProfile.php?Message=$Message");
            exit();
        } else {
            $newImageName = $username;
            $newImageName .= '.' . $imageExtension;

            move_uploaded_file($tmpName, '../images/Admin/' . $newImageName);
        }
    }

    if (!empty($newImageName) && !empty($username) && !empty($password) && !empty($phone) && !empty($email) && !empty($birthday) && !empty($fullname)) {
        $stmt1 = "Select * from admin_account where Username='$username'";
        $stmt2 = "Insert into admin_account(FullName, Phone, Email, Birthday, Username, Password, ProfileImage) values('$fullname','$phone','$email','$birthday','$username','$password','$newImageName');";
        $result = mysqli_query($con, $stmt1);
        if (mysqli_num_rows($result) === 1) {
            $Message = "This Username has already existed!";
            header("Location: ../admin/newAccount.php?Message=$Message");
            exit();
        } else {
            mysqli_query($con, $stmt2);
            header("Location: ../admin/dashboard.php");
            exit();
        }
    } else {
        header("Location: ../admin/newAccount.php");
        exit();
    }
} else {
    header("Location: ../admin/newAccount.php");
    exit();
}
