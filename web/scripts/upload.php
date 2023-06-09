
<?php
include('library.php');
session_start();
$target_dir = "../uploads/";

$uploadOk = 1;
$target_file = $target_dir . $_SESSION['userId'];
$imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION));
// echo $target_dir . $_SESSION['userId'];

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  unlink($target_file);
  $uploadOk = 1;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
//   $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//   rename($_FILES['fileToUpload']['name'], $_SESSION['userId']);


  $target_file = $target_dir . $_SESSION['userId'] . '.png';
  $target_for_db = $_SESSION['userId'] . '.png';
  $conn = get_database_connection();
  $userId = $_SESSION['userId'];
  $sql = <<<SQL
    update users
    set user_pfp = '{$target_for_db}'
    where user_id = $userId
  SQL;

  echo $sql;
  $result = mysqli_query($conn, $sql);
  if(mysqli_query($conn, $sql)){
      move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
      header('location: ../profileUpload.php?success=true');

  }else{
    header('location: ../profileUpload.php?success=false');
  }
  
//     echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
//   } else {
//     echo "Sorry, there was an error uploading your file.";
//   }
}


?>