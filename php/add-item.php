<?php
include("config.php");

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
    $trending = validate($_POST['trending']);

    if ($_FILES['imageSelect']['error'] === 4) {
        $Message = "Please select your image!";
        header("Location: ../admin/addItem.php?Message=$Message");
        exit();
    } else {
        $fileName = $_FILES['imageSelect']['name'];
        $fileSize = $_FILES['imageSelect']['size'];
        $tmpName = $_FILES['imageSelect']['tmp_name'];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));

        if (!in_array($imageExtension, $validImageExtension)) {
            $Message = "Invalid image extension!";
            print_r($imageExtension);
            header("Location: ../admin/addItem.php?Message=$Message");
            exit();
        } else if ($fileSize > 10000000) {
            $Message = "Image size is too large!";
            header("Location: ../admin/addItem.php?Message=$Message");
            exit();
        } else {
            $newImageName = $itemID;
            $newImageName .= '.' . $imageExtension;
            move_uploaded_file($tmpName, '../images/Food/' . $newImageName);
        }
    }

    if (!empty($itemID) && !empty($name) && !empty($price) && !empty($type) && !empty($description) && !empty($newImageName) && !empty($trending)) {
        $stmt1 = "Select * from menu_item where ItemID='$itemID';";
        $stmt2 = "Insert into menu_item values('$itemID','$name','$description','$newImageName',$price,'$type','$trending');";
        $result = mysqli_query($con, $stmt1);
        if (mysqli_num_rows($result) === 1) {
            $Message = "This ID has already been used!";
            header("Location: ../admin/addItem.php?Message=$Message");
            exit();
        } else {
            mysqli_query($con, $stmt2);
            $Message = "Add New Item Successfully!";
            header("Location: ../admin/menu.php?Message=$Message");
            exit();
        }
    } else {
        $Message = "Add New Item Failed!";
        header("Location: ../admin/addItem.php?Message=$Message");
        exit();
    }
} else {
    $Message = "Add New Item Failed!";
    header("Location: ../admin/addItem.php?Message=$Message");
    exit();
}
