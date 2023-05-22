
<?php
include('library.php');
session_start();
$target_dir = "../posts/";
$conn = get_database_connection();
$caption = $email = mysqli_real_escape_string($conn, $caption);

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

// // Check if file already exists
// if (file_exists($target_file)) {
//   unlink($target_file);
//   $uploadOk = 1;
// }

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

if($_FILES["fileToUpload"]["name"] == ''){
    echo "<h1>No caption</h1>";
    $uploadOk = 1;

}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {

    $user_id = $_SESSION['userId'];

    $sql = <<<SQL
        select user_num_posts from users
        where user_id = $user_id;
    SQL;
    
    if($_FILES["fileToUpload"]["name"] != ''){
        $result = mysqli_query($conn, $sql);
        while ($row = $result->fetch_assoc()) {
            $file_name = $_SESSION['userId'] . '-' . $row['user_num_posts'] . '.' . $imageFileType;
            $target_file = $target_dir . $_SESSION['userId'] . '-' . $row['user_num_posts'] . '.' . $imageFileType;
        }
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    }else{
        $file_name = "null";
    }

    $sql = <<<SQL
        update users
        set user_num_posts = user_num_posts + 1
        where user_id = $user_id;
    SQL;

    $result = mysqli_query($conn, $sql);
    echo $result;

    $sql = <<<SQL
        INSERT INTO posts (post_user_id, post_img_url, post_caption, post_created)
        VALUES ($user_id, '{$file_name}', '{$caption}', NOW())
    SQL;
    if (mysqli_query($conn, $sql)){
        header('location: ../posts.php?success=true');

    }else{
        header('locaton: ../posts.php?success=false');
    }


//     echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
//   } else {
//     echo "Sorry, there was an error uploading your file.";
//   }
}


?>
