<?php
$target_dir = "../../../uploads/";
$target_save = basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

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


// // Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//   $uploadOk = 0;
// }
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
// Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//   echo "Sorry, your file was not uploaded.";
// // if everything is ok, try to upload file
// } else {
//   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//     echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
//   } else {
//     echo "Sorry, there was an error uploading your file.";
//   }
// }

$username = $_POST['username'];
$host = "localhost";
$user = "root";
$pw = "";
$database = "laptop_business";
$conn = mysqli_connect($host,$user,$pw,$database);
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}
$sql = "UPDATE users SET image='uploads/$target_save' WHERE username='".$username."'";
if ($conn->query($sql) === TRUE) {
     header("location:../../../info.php");
;
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>