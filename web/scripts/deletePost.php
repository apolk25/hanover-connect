<?php
// to do: make sure hte user actually owns the post
include('library.php');
session_start();
$conn = get_database_connection();
$id = mysqli_real_escape_string($conn, $id);

$userId = $_SESSION['userId'];
$changePostNumber = <<<SQL
    update users
    set user_num_posts = user_num_posts - 1
    where user_id = $userId 
SQL;

$getImage = <<<SQL
    select post_img_url
    from posts
    where post_id = $id
SQL;


$deletePost = <<<SQL
    delete from posts
    where post_id = $id
    and post_user_id = $userId
SQL;

$from = $_GET['from'];
$PF = $_GET['pfid'];
$image = mysqli_query($conn, $getImage);

if(mysqli_query($conn, $changePostNumber)){
    if(mysqli_query($conn, $deletePost)){
        while($row = $image->fetch_assoc()){

            $file_dir = '../posts/' . $row['post_img_url'];
            unlink($file_dir);
            http_response_code(200);

            if($from == 1)
            {
                header('location: ../posts.php?deleteSuccess=true');
            }
            else if($from == 2)
            {
                header('location: ../profile.php?id=' . $pfid . '&deleteSuccess=true');
            }

        }
    }
}

// $sql = <<<SQL
//     -- select * from posts
//     delete from posts
//     where post_id = $id

// SQL;

// if(mysqli_query($conn, $sql)){
//     $userId = $_SESSION['userId'];
//     $sql = <<<SQL
//         select * from users
//         join posts on post_user_id = $userId
//         where user_id = $userId
//         and post_id = $id
//     SQL;

//     $update_posts = <<<SQL
//         update posts
//         set post_id = post_id - 1 
//     SQL;
//     if(mysqli_query($conn, $sql)){
//         $sql = <<<SQL
//             delete from posts
//             where post_id = $id
//         SQL;
//         $conn->query($update_posts);
//         echo $sql;
//         // $result = mysqli_query($conn, $sql);
//         // $row = $result->fetch_assoc();
//         // echo $row['post_img_url'];
//         // $num_posts = $row['user_num_posts'] - 1;
        // $file_dir = '../posts/' . $row[];
        // unlink($file_dir);
  
//         if(mysqli_query($conn, $sql)){
//         $sql = <<<SQL
//             update users
//             set user_num_posts = user_num_posts - 1
//             where user_id = $userId;
//         SQL;
//             http_response_code(200);
//             // header('location: ../posts.php?deleteSucess=true');
//         }else{
//             http_response_code(400);
//             header('location: ../posts.php?deleteSucess=false');

//         }

//     }
// }




?>