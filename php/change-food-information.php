<?php
include("config.php");

session_start();

if (isset($_POST['itemID']) && isset($_POST['itemName']) && isset($_POST['itemPrice']) && isset($_POST['itemType']) && isset($_POST['description'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $itemID = validate($_POST['itemID']);
    $name = validate($_POST['itemName']);
    $price = validate($_POST['itemPrice']);
    $type = validate($_POST['itemType']);
    $description = validate($_POST['description']);
    $oldImage = validate($_SESSION['FoodImage']);
    $trending = validate($_POST['trending']);

    if ($_FILES['imageSelect']['error'] === 4 && empty($oldImage)) {
        $Message = "Please select your image!";
        header("Location: ../admin/editItem.php?Message=$Message");
        exit();
    } else {
        if ($_FILES['imageSelect']['error'] !== 4) {
            $fileName = $_FILES['imageSelect']['name'];
            $fileSize = $_FILES['imageSelect']['size'];
            $tmpName = $_FILES['imageSelect']['tmp_name'];
        } else {
            $fileName = $oldImage;
            $fileSize = 1;
            $tmpName = "../images/Food";
        }

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));

        if (!in_array($imageExtension, $validImageExtension)) {
            $Message = "Invalid image extension!";
            print_r($imageExtension);
            header("Location: ../admin/editItem.php?Message=$Message");
            exit();
        } else if ($fileSize > 10000000) {
            $Message = "Image size is too large!";
            header("Location: ../admin/editItem.php?Message=$Message");
            exit();
        } else {
            $newImageName = $itemID;
            $newImageName .= '.' . $imageExtension;
            move_uploaded_file($tmpName, '../images/Food/' . $newImageName);
        }
    }

    if (!empty($itemID) && !empty($name) && !empty($price) && !empty($type) && !empty($description) && !empty($newImageName) && !empty($trending)) {
        $stmt = "Update menu_item Set ItemID='$itemID', Name='$name', Type='$type', Price='$price', Description='$description', Image='$newImageName', Trending = '$trending' Where ItemID='$itemID';";
        mysqli_query($con, $stmt);
        header("Location: ../admin/menu.php");
        exit();
    } else {
        $Message = "Change Information Failed!";
        header("Location: ../admin/editItem.php?Message=$Message");
        exit();
    }
} else {
    $Message = "Change Information Failed!";
    header("Location: ../admin/editItem.php?Message=$Message");
    exit();
}
