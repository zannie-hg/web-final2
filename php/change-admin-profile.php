<?php
include("config.php");

session_start();

if (isset($_POST['fullname']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['birthday'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $accountID = validate($_SESSION['AccountID']);
    $username = validate($_SESSION['Username']);
    $fullname = validate($_POST['fullname']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $birthday = validate($_POST['birthday']);
    $oldImage = validate($_SESSION['ProfileImage']);
    if (!ctype_digit($phone)) {
        $Message = "Phone number must contain only digits!";
        header("Location: ../admin/editProfile.php?Message=$Message");
        exit();
    }
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

    if (!empty($newImageName) && !empty($accountID) && !empty($fullname) && !empty($phone) && !empty($email) && !empty($birthday)) {
        $stmt = "Update admin_account Set FullName='$fullname', Phone='$phone', Email='$email', birthday='$birthday', ProfileImage='$newImageName' Where AdminID='$accountID';";
        mysqli_query($con, $stmt);
        header("Location: ../admin/profile.php");
        exit();
    } else {
        $Message = "Change Information Failed!";
        header("Location: ../admin/editProfile.php?Message=$Message");
        exit();
    }
} else {
    $Message = "Change Information Failed!";
    header("Location: ../admin/editProfile.php?Message=$Message");
    exit();
}
