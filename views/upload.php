<?php
include "conn.php";


$target_dir = "uploads/";
$firstname = $_POST["firstname"];
$middlename = $_POST["middlename"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$status = "Pending";
$advice = $target_dir . basename($_FILES["advice"]["name"]);
$excel = $target_dir . basename($_FILES["excel"]["name"]);
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($advice)) {
  echo "Sorry, advice file already exists.";
}

if (file_exists($advice)) {
  echo "Sorry, advice file already exists.";
}

$stmt = $conn->prepare("INSERT INTO accounts (firstname, middlename, lastname, email, excel, advice) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $firstname, $middlename, $lastname, $email, $excel, $advice);
$stmt->execute();
if (move_uploaded_file($_FILES["advice"]["tmp_name"], $advice) && move_uploaded_file($_FILES["excel"]["tmp_name"], $excel)) {
  echo "The file has been uploaded.";
} else {
  echo "Sorry, there was an error uploading your file.";
}
$stmt->close();
$conn->close();

// Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//   if($check !== false) {
//     echo "File is an image - " . $check["mime"] . ".";
//     $uploadOk = 1;
//   } else {
//     echo "File is not an image.";
//     $uploadOk = 0;
//   }
// }



// Check if file already exists
// if (file_exists($target_file)) {
//   echo "Sorry, file already exists.";
//   $uploadOk = 0;
// }

// Check file size
    // if ($_FILES["fileToUpload"]["size"] > 500000) {
    //   echo "Sorry, your file is too large.";
    //   $uploadOk = 0;
    // }

// Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//   $uploadOk = 0;
// }

// Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//   echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
// } else {
//   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//     echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
//   } else {
//     echo "Sorry, there was an error uploading your file.";
//   }
// }
?>